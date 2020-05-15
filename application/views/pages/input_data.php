<div class=container>
    <div class=row>
        <div class=card style="margin-top:20%">
            <div class=card-body>
                <form method="post" action="<?php echo base_url()?>index.php/home/action_insert">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_depan">Nama Depan</label>
                            <input type="text" name="nama_depan" class="form-control" id="nama_depan" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nama_belakang">Nama Belakang</label>
                            <input type="text" name="nama_belakang" class="form-control" id="nama_belakang" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="custom-select" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option selected disabled value="">Pilih...</option>
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="no_hp">Nomor Hp</label>
                            <input type="text" name="no_hp" class="form-control" id="no_hp" required>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" required>
                        </div>
                        </div>
                    </div>
                    <div class="form-row">
                        
                    </div>
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </form>
            </div>
        </div>
    </div>
</div>