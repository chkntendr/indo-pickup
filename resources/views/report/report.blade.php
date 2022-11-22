@extends('layouts.app')

@section('title', 'Report')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Grafik</h5>
                    <canvas id="laporan" style="max-height: 400px; display: block; box-sizing: border-box; height: 191px; width: 382px;" width="382" height="191"></canvas>
                </div>
            </div>
        </div>

        {{-- <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <select name="livesearch" class="livesearch form-control">
                        <option value=""></option>
                    </select>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Download Lampiran</h5>
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Tipe</th>
                                <th>Client</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-sm btn-success">
                        <i class="bi bi-download"></i>
                        Download
                    </button>
                </div>
            </div>
        </div> --}}

        <div class="col-lg-6" id="laporan" style="display: block;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Buat Laporan</h5>
                    <button id="newReport" class="btn btn-sm btn-primary" onclick="showReportForm()">
                        <i class="bi bi-plus"></i>
                        Laporan
                    </button>
                    <form action="" id="form" style="display: none;">
                        <select name="" id="" class="form-control my-2">
                            
                        </select>
                        <input type="date" class="form-control my-2" name="" id="">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="bi bi-download"></i>
                            load
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- <div class="col-lg-6" id="form" style="display: none;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form</h5>
                </div>
            </div>
        </div> --}}
    </div>
</section>
@endsection