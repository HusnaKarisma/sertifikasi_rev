
<?php $__env->startSection('content'); ?>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Formulir Pengajuan a.n <?php echo e($peserta->nama); ?> [NIP: <?php echo e($peserta->nip); ?>]</h3>
        </div>

        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered">
                <tr>
                  <th colspan="3">
                    <span>a. Data Pribadi</span>
                  </th>
                </tr>
                <?php echo app(\Imanghafoori\Widgets\Utils\WidgetRenderer::class)->renderWidget('DataPribadi',['id'=>$peserta->id]); ?>
                <tr>
                  <th colspan="3">
                    <span>b. Data Pekerjaan</span>
                  </th>
                  <?php echo app(\Imanghafoori\Widgets\Utils\WidgetRenderer::class)->renderWidget('DataPekerjaan',['id'=>$peserta->id]); ?>
                </tr>
                <tr>
                  <th colspan="3">
                    <span>c. Data Permohonan Sertifikasi</span>
                  </th>
                </tr>
                <tr>
                  <td>Tujuan Asesmen</td>
                  <td><?php if(empty($peserta->tujuan_lainnya)): ?>
                        <?php echo e($peserta->tujuan_sertifikasi); ?>

                      <?php else: ?>
                        <?php echo e($peserta->tujuan_lainnya); ?>

                      <?php endif; ?>

                  </td>
                </tr>
                <tr>
                  <td>Kode Sertifikasi Kompetensi</td>
                  <td><?php echo e($peserta->kluster_code); ?></td>
                </tr>
                <tr>
                  <td>Skema Sertifikasi Kompetensi</td>
                  <td><?php echo e($peserta->kluster_name); ?></td>
                </tr>
                <tr>
                    <th colspan="3">
                        <span>Dokumen Wajib</span>
                    </th>
                </tr>
                <?php if(empty($peserta->photo)): ?>
                <tr>
                  <td colspan="3">
                  <a href='<?php echo e(CRUDBooster::adminpath("dokumen_sertifikasi/edit/$peserta->document_id")); ?>'>Upload Dokumen</a>
                  </td>
                <tr>
                <?php else: ?>
                <tr>
                  <td>KTP</td>
                  <td colspan="2">
                    <a data-lightbox="roadtrip" href='<?php echo e(url("/$peserta->scan_ktp")); ?>'>
                    <img width="40px" height="40px" src='<?php echo e(url("/$peserta->scan_ktp")); ?>'/>
                    </a>
                  <td>
                </tr>
                <tr>
                  <td>Ijazah</td>
                  <td colspan="2">
                  <a data-lightbox="roadtrip" href='<?php echo e(url("/$peserta->scan_ijazah")); ?>'>
                    <img width="40px" height="40px" src='<?php echo e(url("/$peserta->scan_ijazah")); ?>'/>
                  </a>  
                  <td>
                </tr>
                <tr>
                  <td>SK / Surat Keterangan Bekerja</td>
                  <td colspan="2">
                  <a data-lightbox="roadtrip" href='<?php echo e(url("/$peserta->scan_sk")); ?>'>
                    <img width="40px" height="40px" src='<?php echo e(url("/$peserta->scan_sk")); ?>'/>
                  </a>
                  <td>
                </tr>
                <?php endif; ?>
                <tr>
                    <th colspan="3">
                        <span>Daftar Unit Kompetensi</span>
                    </th>
                </tr>
                <tr>
                  <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                          <tr>
                            <th>No</th>
                            <th>Kode Unit</th>
                            <th>Judul Unit</th>
                            <th>Jenis Standar</th>
                            <th>Dokumen</th>
                          </tr>
                          <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($unit->unit_code); ?></td>
                            <td><?php echo e($unit->unit_title); ?></td>
                            <td><?php echo e($unit->standard_type); ?></td>
                            <?php if(empty($unit->dokumen_pendukung)): ?>
                              <td><a href='<?php echo e(CRUDBooster::adminpath("dokumen_pendukung/edit/$unit->id_dokumen_pendukung")); ?>'>Upload Dokumen</a></td>
                            <?php else: ?>
                              <td align="center">
                                <a class="dokumen" href='<?php echo e(url("/$unit->dokumen_pendukung")); ?>' target="_blank" >
                                   <img width="30px" height="30px" src='<?php echo e(url("/icon_pdf.png")); ?>'/>
                                </a>
                              </td>
                            <?php endif; ?>
                            
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                  </div>
                </tr>
              </table>
            </div>
          </div>
        </div>

        <?php if($peserta->submit_status < 2): ?>
        <div class="box-footer text-center">
          <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action="<?php echo e(Route('sertifikasi.submit')); ?>">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden"  name="sertifikasi_id" value= "<?php echo e($peserta->id); ?>" />
            <button type="submit" class="btn btn-default btn-md">Submit<i class="fa fa-disk"></i></button>
          </form>
        </div>
        <?php endif; ?>
        <?php if($peserta->submit_status == 2 && CRUDBooster::myPrivilegeId() == 1): ?>
        <div class="box-footer text-center">
          <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action="<?php echo e(Route('sertifikasi.approve')); ?>">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden"  name="sertifikasi_id" value= "<?php echo e($peserta->id); ?>" />
            <input type="text"  class="col-sm-8" placeholder="Masukkan catatan...." name="note"/>
            <button type="submit" class="btn btn-default btn-md" name="status" value="4">Tolak<i class="fa fa-disk"></i></button>
            <button type="submit" class="btn btn-default btn-md" name="status" value="3">Terima<i class="fa fa-disk"></i></button>
          </form>
        </div>
        <?php endif; ?>
        <?php if($peserta->submit_status == 5 && CRUDBooster::myPrivilegeId() == 1 && empty($peserta->jadwal_id)): ?>
        <div class="col-md-12">
        <div class="box box-success box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Jadwal Asesmen</h3>
            </div>
          </div>
          <div class="box-body">
            <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action="<?php echo e(Route('sertifikasi.jadwal')); ?>">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden"  name="sertifikasi_id" value= "<?php echo e($peserta->id); ?>" />
            <div class="form-group" id="jadwal">
              <label class="col-sm-3 control-label">Jadwal Asesmen</label>
              <div class="col-sm-5">
                <select name="jadwal_id" id="jadwal_id" class="form-control">
                  <option value="pilih">Pilih Jadwal Asesmen</option>
                  <?php $__currentLoopData = $jadwal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($k->id); ?>"><?php echo e(date('d-M-Y', strtotime($k->tanggal_mulai))); ?> s.d <?php echo e(date('d-M-Y', strtotime($k->tanggal_selesai))); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="col-sm-4">
                <button type="submit" class="btn btn-block btn-primary btn-flat" name="status" >Buat Jadwal<i class="fa fa-disk"></i></button>
              </div>
            </div>
            </form>
          </div>
        </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('crudbooster::admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>