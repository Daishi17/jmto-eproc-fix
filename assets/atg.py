# MODUL KERJA PROJECT PERTAMINA ANGGA

# 1.	Instal Modul Python
# -	pip install pyserial
# -	pip install mysql-connector-python

# 2.	Koneksi Atg Pake (Serial Comunication)

# Di bawah ini pake bahasa python

import serial
import time

# Konfigurasi port serial (sesuaikan dengan port yang digunakan oleh ATG)
serial_port = 'COM1'  # Ganti dengan port yang sesuai pada atg
baud_rate = 9600
ser = serial.Serial(serial_port, baud_rate, timeout=1)


# Fungsi untuk membaca data dari ATG
def read_data_from_atg():
data = ser.readline().decode('utf-8').strip()
    return data

import mysql.connector

# Konfigurasi koneksi MySQL (sesuaikan dengan pengaturan MySQL Anda)
mysql_config = {
    'host': 'localhost',
    'user': 'username',
    'password': 'password',
    'database': 'nama_database',
}
conn = mysql.connector.connect(**mysql_config)
cursor = conn.cursor()


# INI UNTUK MEMBACA DAN SIMPAN KE DATABASE SQL
try:
    while True:
        # Baca data dari ATG
        data_from_atg = read_data_from_atg()

    if data_from_atg:
            
    def process_atg_data(data):
    # Pisahkan data menjadi nilai terpisah
    data_values = data.split(',')

    # Pastikan jumlah nilai sesuai dengan format yang diharapkan
    if len(data_values) == 3:
        # Ambil nilai untuk setiap parameter
        level = float(data_values[0].strip())
        temperature = float(data_values[1].strip())
        pressure = float(data_values[2].strip())
        # Simpan data ke MySQL
            query = "INSERT INTO nama_tabel (kolom1, kolom2) VALUES (%s, %s)"
            values = (level, temperature,pressure)  # Gantilah dengan nilai yang sesuai
            cursor.execute(query, values)
            conn.commit()
            # Tunggu selama beberapa detik sebelum membaca data lagi
            time.sleep(5)
    else:
        print("Format data tidak sesuai. Tidak dapat memproses.")
        return None

except KeyboardInterrupt:
    pass
finally:
    # Tutup koneksi ke port serial dan MySQL saat program berakhir
    ser.close()
    cursor.close()
    conn.close()
