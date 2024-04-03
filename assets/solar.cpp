#define RELAY_PIN_POMPA_AIIR 9 // ini untuk pompa air
#define RELAY_PIN 8 // ini untuk selenoid
#include <Keypad.h>
#include <Wire.h> 
#include <LiquidCrystal_I2C.h>
#include <SPI.h>
#include <Ethernet.h>
#include <ArduinoJson.h> 

// =========== INI UNTUK ETHERNET ADDRES ======================
byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
IPAddress ip(192, 168, 1, 5); // Your Arduino's IP address
EthernetClient client;
// =========== END ETHERNET ADDRES ============================

// =========== INI UNTUK KEYPAD ======================
const byte ROWS = 4; 
const byte COLS = 4; 
char keys[ROWS][COLS] = {
  {'1','2','3','A'},
  {'4','5','6','B'},
  {'7','8','9','C'},
  {'*','0','#','D'}
};
byte rowPins[ROWS] = {22, 24, 26, 28}; 
byte colPins[COLS] = {30, 32, 34, 36};
Keypad keypad = Keypad(makeKeymap(keys), rowPins, colPins, ROWS, COLS);
const int maxChars = 16; 
char inputBuffer[maxChars + 1]; // Buffer untuk menyimpan input dari keypad
int bufferIndex = 0; // Indeks saat ini di dalam buffer
// =========== END KEYPAD ==============================

// INI UNTUK LCD
LiquidCrystal_I2C lcd(0x27, 16, 2); // Alamat I2C untuk LCD, jumlah kolom, dan jumlah baris
// END LCD


void setup() {

    lcd.init(); // Inisialisasi LCD
    lcd.backlight(); // Nyalakan backlight LCD
    lcd.print("Connecting...");

    // ====== INI UNTUK CONECTING ARDUINO KE MINI PC ============
    while (Ethernet.begin(mac) != 1) {
      lcd.clear(); 
      lcd.print("Error connecting to network");
      delay(1000);
    }
      lcd.clear(); 
      lcd.print("Connected!");
    // ====== END CONECTING ARDUINO KE MINI PC ============

    // ========== INI INISIALISASI RELAY ===========
    pinMode(RELAY_PIN_POMPA_AIIR, OUTPUT); 
    pinMode(RELAY_PIN, OUTPUT);
    // ========= END INISIALISASI RELAY ============

    // ======= INI UNTUK RELAY KONDISI SAAT NYALA ARDUINO =======
    digitalWrite(RELAY_PIN_POMPA_AIIR, HIGH);
    digitalWrite(RELAY_PIN, HIGH); 
    // ======= END UNTUK RELAY KONDISI SAAT NYALA ARDUINO =======

    Serial.begin(9600);
}

void loop() {
   // ======== INI MELAKUKAN PERMINTAAN GETTING KE SERVER MINI PC =========
  if (client.connect("192.168.1.2", 80)) {
    Serial.println("BERHASIL TERHUBUNG KE SERVER");
    client.println("GET /web_sevice_skripsi/api/skripsi_api/ambildata HTTP/1.1");
    client.println("Host: 192.168.1.2");
    client.println("Connection: close");
    client.println();
  } else {
    // INI JIKA KONDISI GAGAL TERHUBUNG
    Serial.println("KONEKSI KE SERVER GAGAL");
    return;
  }
  // ======== END MELAKUKAN PERMINTAAN GETTING KE SERVER MINI PC =========

  while (client.connected()) {    
    if (client.available()) {
        String line = client.readStringUntil('\n');

      // Memeriksa jika line kosong
      if (!line.length()) {
        lcd.print("Data kosong diterima");
      } else {
        if (line.startsWith("{")) {
          DynamicJsonDocument doc(1024);
          DeserializationError error = deserializeJson(doc, line);
          if (!error) {
            if (doc.containsKey("liter")) {
              const char* sensor = doc["liter"];
              int liter = doc["liter"];
              lcd.setCursor(0, 0);
              lcd.print("Liter: ");
              lcd.print(liter);
              lcd.print(" L");
              lcd.setCursor(0, 1);
              lcd.print("Total Ltr: ");

              // ====== INI KONDISI JIKA TOTAL LITER DARI SERVER SAMA DENGAN LITER DARI PULSER / FLOW METTER =====
              lcd.print('50000');
              if (liter <= 5000) {
                lcd.clear();
                lcd.print("Air mati");
                client.stop();
              }
               // ====== END KONDISI JIKA TOTAL LITER DARI SERVER SAMA DENGAN LITER DARI PULSER / FLOW METTER =====
            } else {
              lcd.print("Data tidak tersedia");
            }
          } else {
            lcd.print("Gagal mengurai JSON");
          }
        }
      }
    }
  }
    client.stop();
}