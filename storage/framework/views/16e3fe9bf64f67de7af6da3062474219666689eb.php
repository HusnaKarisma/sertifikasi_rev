<tr>
  <td style="width: 25%;">Nama Lengkap</td>
  <td><?php echo e($data->nama); ?></td>
  <td rowspan="3" style="width: 20%;" class="text-center"><img src='<?php echo e(url("/$data->photo")); ?>' class="img img-thumbnail" style="width:100px;"></td>
</tr>
<tr>
  <td>Tempat/Tanggal Lahir</td>
  <td><?php echo e($data->tempat_lahir); ?>, <?php echo e(date("d-M-Y", strtotime($data->tanggal_lahir))); ?></td>
</tr>
<tr>
  <td>Jenis Kelamin</td>
  <td><?php echo e($data->jk); ?></td>
</tr>
<tr>
  <td>Kebangsaan</td>
  <td colspan="2"><?php echo e($data->kebangsaan); ?></td>
</tr>
<?php if($data->province != null): ?>
<tr>
  <td>Alamat</td>
  <td colspan="2"><?php echo e($data->alamat); ?> <?php echo e($data->village); ?> KEC. <?php echo e($data->district); ?> <?php echo e($data->regency); ?> <?php echo e($data->province); ?> <?php echo e($data->kodepos); ?></td>
</tr>
<tr>
  <td>No. Telepon</td>
  <td colspan="2"><?php echo e($data->telp_rumah); ?></td>
</tr>
<tr>
  <td>Telp Kantor</td>
  <td colspan="2"><?php echo e($data->telp_kantor); ?></td>
</tr>
<tr>
  <td>HP</td>
  <td colspan="2"><?php echo e($data->telp); ?></td>
</tr>
<tr>
  <td>Email</td>
  <td colspan="2"><?php echo e($data->email); ?></td>
</tr>
<tr>
  <td>Pendidikan Terakhir</td>
  <td colspan="2"><?php echo e($data->pendidikan_terakhir); ?></td>
</tr>
<?php else: ?>
<tr><td>
        <a href='<?php echo e(CRUDBooster::adminPath()); ?>/contact/edit/<?php echo e($data->conid); ?>'>Add Alamat</a>
    </td>
</tr>

<?php endif; ?>