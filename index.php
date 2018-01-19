<html>
	<head>
		<title>Расчет суммы депозита (вклада)</title>
		<link rel="stylesheet" href="index.css">
	</head>
	<body>
		<?php
			$Sp = '';
			$S = '';
			$t = '';
			if (isset($_GET['Sp'])) {
				$Sp = $_GET['Sp'];
			}
			if (isset($_GET['S'])) {
				$S = $_GET['S'];
			}
			if (isset($_GET['t'])) {
				$t = $_GET['t'];
			}
		?>
		<form action="index.php" method="GET" width="700">
		<h2>Расчет суммы депозита (вклада)</h2>
			Sp - сумма денежных средств, причитающихся к возврату вкладчику по окончании срока депозита<br>
			S - первоначальная сумма привлеченных в депозит денежных средств<br>
			t - количество дней начисления процентов по привлеченному вкладу<br>
			Sp: <input <?php if($Sp!='' && (!is_numeric($Sp) || $Sp<=0)) {
				echo 'class="invalid"';
			} ?> type="text" name="Sp" value="<?= htmlspecialchars($Sp)?>"><br><br>
			S: <input <?php if($S!='' && (!is_numeric($S) || $S<=0)) {
				echo 'class="invalid"';
			} ?> type="text" name="S" value="<?= htmlspecialchars($S)?>"><br><br>
			t: <input <?php if($t!='' && (!is_numeric($t) || $t<=0)) {
				echo 'class="invalid"';
			} ?> type="text" name="t" value="<?= htmlspecialchars($t)?>"><br><br>
			<input type="submit" value="Вычислить годовую процентную ставку"><br>
			<img src="formula.jpg">
		</form>
		<?php
			if ($Sp != '' && $S != '' && $t != '') 
			{
					if (!is_numeric($Sp) || $Sp<=0) {
						echo "Ошибка при вводе суммы денежных средств причитающихся к возврату (Sp)!";
					}
					else if (!is_numeric($S) || $S<=0){
						echo "Ошибка при вводе первоначальной суммы вклада (S)!";
					}
					else if (!is_numeric($t) || $t<=0){
						echo "Ошибка при вводе количества дней начисления процентов (t)!";
					}
					else
					{
						$result=($Sp*100)/($S*($t/365));
						$formatedresult = number_format($result, 2, ',', ' ');
						echo 'Годовая процентная ставка равна:'. htmlspecialchars($formatedresult).' %';
					}
			}
			else if ($Sp != '')
			{
				echo "Введите сумму денежных средств причитающихся к возврату (Sp)!";
			}
			else if ($S != '')
			{
				echo "Введите первоначальную сумму вклада (S)!";
			}
			else if ($t != '')
			{
				echo "Введите количество дней начисления процентов (t)!";
			}
		?>
	</body>
</html>
