<tr>
  <td>Nama Lembaga/Perusahaan</td>
  <td><?php echo e($data->nama_instansi); ?></td>
</tr>
<tr>
  <td>Jabatan</td>
  <td><?php echo e($data->jabatan); ?></td>
</tr>

<tr>
  <td>Alamat</td>
  <td colspan="2"><?php echo e($data->alamat); ?> <?php echo e($data->village); ?> KEC. <?php echo e($data->district); ?> <?php echo e($data->regency); ?> <?php echo e($data->province); ?> <?php echo e($data->kode_pos); ?></td>
</tr>
<tr>
  <td>No. Telepon</td>
  <td colspan="2"><?php echo e($data->no_telp); ?></td>
</tr>
<tr>
  <td>No. Fax</td>
  <td colspan="2"><?php echo e($data->no_fax); ?></td>
</tr>
