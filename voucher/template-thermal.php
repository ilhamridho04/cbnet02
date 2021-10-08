												<?php
// Copy Paste ke template editor [Settings -> Template Editor].

if (substr($validity, -1) == "d") {
  $validity = "Aktif:" . substr($validity, 0, -1) . "Hari";
} else if (substr($validity, -1) == "h") {
  $validity = "Aktif:" . substr($validity, 0, -1) . "Jam";
}
if (substr($timelimit, -1) == "d" & strlen($timelimit) > 3) {
  $timelimit = "Durasi:" . ((substr($timelimit, 0, -1) * 7) + substr($timelimit, 2, 1)) . "Hari";
} else if (substr($timelimit, -1) == "d") {
  $timelimit = "Durasi:" . substr($timelimit, 0, -1) . "Hari";
} else if (substr($timelimit, -1) == "h") {
  $timelimit = "Durasi:" . substr($timelimit, 0, -1) . "Jam";
} else if (substr($timelimit, -1) == "w") {
  $timelimit = "Durasi:" . (substr($timelimit, 0, -1) * 7) . "Hari";
}
$mitra = explode("-", $comment);
if($mitra >= 4){
	$com3 = $mitra[3];
	$com4 = $mitra[4];
	$getcomment = $com3." ".$com4;
}
?>

<style type="text/css">
.rotate {
  vertical-align: bottom;
  text-align: center;
}
.rotate span {
  -ms-writing-mode: tb-rl;
  -webkit-writing-mode: vertical-rl;
  writing-mode: vertical-rl;
  transform: rotate(180deg);
  white-space: nowrap;
}
.qrcode{
		height:60px;
		width:60px;
}

</style>

<table class="voucher" style="width: 230px;">
  <tbody>
    <tr>
      <td style="font-weight: bold; border-right: 1px solid black;" class="rotate" rowspan="4"><span><?= $price; ?></span></td>
      <td style="font-weight: bold" colspan="2"><?= $getcomment; ?> </td>
      <?php if ($qr == "yes") { ?>
      <td style="" rowspan="3"><?= $qrcode ?></td>
      <?php 
    } else { ?>
      <td style="" rowspan="3"><img style="width: 60px; height: 60px;" src="<?= $logo ?>" alt="logo"></td>  
      <?php 
    } ?>
    </tr>
    <tr>
      <?php if ($usermode == "vc") { ?>  
      <td style="width: 100%; border-top: 1px solid black; border-bottom: 1px solid black; font-size: 20px; text-align: center;"><?= $username; ?></td>
      <?php 
    } elseif ($usermode == "up") { ?>
      <td style="width: 100%; border-top: 1px solid black; border-bottom: 1px solid black; font-size: 15px; text-align: left;"><?= "User: " . $username . "<br>Pass: " . $password; ?></td>
      <?php 
    } ?>  
    </tr>
    <tr>
      <td style="font-size: 10px;"><?= $validity; ?> <?= $timelimit; ?> <?= $datalimit; ?></td>
    </tr>
    <tr>
<!--
	<tr>
      <td colspan="3" style="font-size: 10px;">MITRA : </span></td>
    </tr>
-->
      <td colspan="3" style="font-size: 10px;">Login: http://<?= $dnsname; ?> <span id="num"> <?= " [$num]"; ?></span></td>
    </tr>
	
  </tbody>
</table>