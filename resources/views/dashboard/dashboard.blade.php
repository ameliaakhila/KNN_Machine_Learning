@extends('layout')

@section('title', 'Dashboard')

@section('content')
    <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <div class="card-body">
            <h4 class="card-title text-center">Aplikasi klasifikasi Data Dengan Metode KNN</h4>
            <p style="text-align: justify;"><b>KNN adalah singkatan dari K-Nearest Neighbors,</b> sebuah algoritma dalam
                machine
                learning. KNN adalah algoritma
                pembelajaran terawasi yang mengklasifikasikan objek berdasarkan kedekatan jaraknya dengan data latih
                yang
                sudah ada.
                Secara sederhana, KNN bekerja dengan cara mencari "k" data latih terdekat (tetangga) dari suatu titik
                data
                baru, lalu
                mengklasifikasikan titik data baru tersebut berdasarkan mayoritas kelas dari tetangga-tetangga
                terdekatnya.
            </p>

            <h5>Rumus Kuadrat Jarak Euclidean:</h5>
            <div class="d-flex justify-content-center align-content-center">
                <img class="w-50 img-fluid" src="{{ asset('assets/images/logos/rumus.png') }}" alt="rumus knn">
            </div>

            <h5>Keterangan:</h5>
            <ul style="margin-left:15px; list-style: square">
                <li><b>dist(x,y) :</b> Jarak antara dua vektor atau titik data x dan y</li>
                <li><b>√ :</b> Akar kuadrat dari jumlah kuadrat perbedaan tiap elemen</li>
                <li><b>∑ :</b> (Simbol sigma) menjumlahkan dari indeks 𝑖 = 1 hingga 𝑛</li>
                <li><b>𝑛 :</b> Jumlah dimensi atau fitur pada vektor/data</li>
                <li><b>𝑥<sub>i</sub> :</b> Nilai fitur ke-i dari vektor 𝑥 (data pertama)</li>
                <li><b>𝑦<sub>i</sub> :</b> Nilai fitur ke-i dari vektor 𝑦 (data kedua)</li>
                <li><b>(𝑥<sub>i</sub> − 𝑦<sub>i</sub>) : </b>Kuadrat selisih antara nilai fitur ke-i dari 𝑥 dan 𝑦
                </li>
            </ul>
        </div>
    </div>
@endsection
