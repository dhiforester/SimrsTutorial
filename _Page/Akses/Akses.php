<section class="section dashboard mb-4">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="accordion accordion-flush mb-3 border-bottom" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne"> 
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collapse1"> 
                                    Filter & Pencarian
                                </button>
                            </h2>
                            <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" style="">
                                <div class="accordion-body">
                                    <form action="javascript:void(0);" id="ProsesBatas" autocomplete="off">
                                        <input type="hidden" name="page" id="page" value="1">
                                        <div class="row mb-3 mt-3">
                                            <div class="col-md-12 mb-2">
                                                <label for="batas">Data</label>
                                                <select name="batas" id="batas" class="form-control">
                                                    <option value="5">5</option>
                                                    <option selected value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                    <option value="250">250</option>
                                                    <option value="500">500</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12 mb-2">
                                                <label for="ShortBy">Mode Urutan</label>
                                                <select name="ShortBy" id="ShortBy" class="form-control">
                                                    <option value="DESC">Z to A</option>
                                                    <option value="ASC">A to Z</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12 mb-2">
                                                <label for="OrderBy">Dasar Urutan</label>
                                                <select name="OrderBy" id="OrderBy" class="form-control">
                                                    <option value="">Pilih</option>
                                                    <option value="nama">Nama</option>
                                                    <option value="kontak">Kontak</option>
                                                    <option value="email">Email</option>
                                                    <option value="akses">Akses</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12 mb-2">
                                                <label for="keyword_by">Dasar Pencarian</label>
                                                <select name="keyword_by" id="keyword_by" class="form-control">
                                                    <option value="">Pilih</option>
                                                    <option value="nama">Nama</option>
                                                    <option value="kontak">Kontak</option>
                                                    <option value="email">Email</option>
                                                    <option value="akses">Akses</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12 mb-2" id="FormKeyword">
                                                <label for="keyword">Kata Kunci</label>
                                                <input type="text" name="keyword" id="keyword" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12 mb-2">
                                                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded">
                                                    <i class="bi bi-search"></i> Cari
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12 mb-2">
                            <button type="button" class="btn btn-md btn-primary btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalTambahAkses">
                                <i class="bi bi-plus"></i> Tambah Akses
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9" id="MenampilkanTabelAkses">
            
        </div>
    </div>
</section>