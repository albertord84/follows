<?php
/**
 *
 * @author ruslan
 */
//require_once '../../src/system/libraries/Calendar.php';
/*$this->load->library('calendar');
echo $this->calendar->generate();*/
?>
<select name="day">
  <option value="">Dia</option>
	<?php for ($day = 1; $day <= 31; $day++) { ?>
	<option value="<?php echo strlen($day)==1 ? '0'.$day : $day; ?>"><?php echo strlen($day)==1 ? '0'.$day : $day; ?></option>
	<?php } ?>
</select>
<select name="month">
	<option value="">Mês</option>
	<?php for ($month = 1; $month <= 12; $month++) { ?>
	<option value="<?php echo strlen($month)==1 ? '0'.$month : $month; ?>"><?php echo strlen($month)==1 ? '0'.$month : $month; ?></option>
	<?php } ?>
</select>
<select name="year">
  <option value="">Ano</option>
  <?php for ($year = date('Y'); $year <= date('Y')+1; $year++) { ?>
	<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
	<?php } ?>
</select>
