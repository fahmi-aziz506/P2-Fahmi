<?php

use Illuminate\Support\Facades\DB;

$setting = DB::table('settings')->first();
$user = DB::table('users')->first();

?>
@extends('layout.main')
@section('content')
    <style>
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <div class="container-fluid">
        <div class="header no-print">
            <h2 class="header-title">Laporan </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb gap-2">
                    <li class="breadcrumb-item"><a href='{{ route('user.dashboard') }}'>Dashboard</a></li>
                    <span style="color: white">/</span>
                    <li class="breadcrumb-item active" aria-current="page">Laporan </li>
                </ol>
            </nav>
        </div>

        <div id="print-area">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body m-sm-3 m-md-5">
                            <div class="mb-4">
                                Hello <strong>
                                    @if (auth()->user()->role == 'admin')
                                        <span class="badge bg-info">Admin</span>
                                    @else
                                        <span class="badge bg-success">Supervisor</span>
                                    @endif
                                    {{ auth()->user()->name }}
                                </strong> <br>
                                <div class="col-md-12 text-md-end">
                                    <img style="position: relative; bottom:-10px; border-radius:50%;" width="70px;"
                                        src="{{ asset('storage/logo_perusahaan/' . $setting->path_logo) }}" alt="">
                                </div>
                            </div> <br>

                            <div style="position: relative; top: -30px;" class="row mb-4">
                                <div class="col-md-6">
                                    <strong>
                                        Nama Perusahaan : <br>
                                        Email Perusahaan : <br>
                                        Alamat Perusahaan : <br>
                                        No Telepon Perusahaan : <br>
                                    </strong>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <strong>
                                        {{ $setting->nama_perusahaan }} <br>
                                        {{ $setting->email_perusahaan }} <br>
                                        {{ $setting->alamat }} <br>
                                        {{ $setting->telepon }} <br>
                                    </strong>
                                </div>
                            </div>
                        </div>

                        <hr>

                        @yield('laporan')

                        <div class="text-center">

                            <!-- Tombol Print & Download PDF -->
                            <button class="no-print btn btn-primary" onclick="printTable()">Print</button>
                            <button class="no-print btn btn-success" onclick="downloadPDF()">Download PDF</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function printTable() {
                let printContents = document.getElementById("datatables-reponsive-1").outerHTML;
                let originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }

            function downloadPDF() {
                const {
                    jsPDF
                } = window.jspdf;
                let doc = new jsPDF('p', 'mm', 'a4');

                html2canvas(document.getElementById("datatables-reponsive-1")).then(canvas => {
                    let imgData = canvas.toDataURL('image/png');
                    let imgWidth = 190; // Lebar dalam mm
                    let imgHeight = (canvas.height * imgWidth) / canvas.width;

                    doc.addImage(imgData, 'PNG', 10, 10, imgWidth, imgHeight);
                    doc.save("tabel-service.pdf");
                });
            }

            function printTable() {
                let printContents = document.getElementById("print-area").outerHTML;
                let originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }

            function downloadPDF() {
                const {
                    jsPDF
                } = window.jspdf;
                html2canvas(document.getElementById("print-area")).then((canvas) => {
                    let pdf = new jsPDF("p", "mm", "a4");
                    let imgData = canvas.toDataURL("image/png");
                    let imgWidth = 210; // A4 width in mm
                    let pageHeight = 297; // A4 height in mm
                    let imgHeight = (canvas.height * imgWidth) / canvas.width;

                    pdf.addImage(imgData, "PNG", 0, 0, imgWidth, imgHeight);
                    pdf.save("Laporan-Servis.pdf");
                });
            }


            function printTable() {
                window.print();
            }
        </script>
    @endsection
