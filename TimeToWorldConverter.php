<?php
	namespace Me\Korolevsky;

	class TimeToWorldConverter implements TimeToWorldConvertingInterface {

		public function convert(int $hours, int $minutes): string {
			$hourWords = [
				1 => ['Один', 'одного', 'первого'],
				2 => ['Два', 'двух', 'второго'],
				3 => ['Три', 'трёх', 'третьего'],
				4 => ['Четыре', 'четырёх', 'четвертого'],
				5 => ['Пять', 'пяти', 'пятого'],
				6 => ['Шесть', 'шести', 'шестого'],
				7 => ['Семь', 'семи', 'седьмого'],
				8 => ['Восемь', 'восьми', 'восьмого'],
				9 => ['Девять', 'двеяти', 'девятого'],
				10 => ['Десять', 'десяти', 'десятого'],
				11 => ['Одиннадцать', 'одиннадцати', 'одиннадцатого'],
				12 => ['Двенадцать', 'двенадцати', 'двенадцатого']
			];

			$minuteWords = [
				1 => 'Одна',
				2 => 'Две',
				3 => 'Три',
				4 => 'Четыре',
				5 => 'Пять',
				6 => 'Шесть',
				7 => 'Семь',
				8 => 'Восемь',
				9 => 'Девять',
				10 => 'Десять',
				11 => 'Одиннадцать',
				12 => 'Двенадцать',
				13 => 'Тринадцать',
				14 => 'Четырнадцать',
				15 => 'Пятнадцать',
				16 => 'Шестнадцать',
				17 => 'Семнадцать',
				18 => 'Восемнадцать',
				19 => 'Девятнадцать',
				20 => 'Двадцать',
				21 => 'Двадцать одна',
				22 => 'Двадцать две',
				23 => 'Двадцать три',
				24 => 'Двадцать четыре',
				25 => 'Двадцать пять',
				26 => 'Двадцать шесть',
				27 => 'Двадцать семь',
				28 => 'Двадцать восемь',
				29 => 'Двадцать девять',
			];

			if($minutes == 0) {
				return $hourWords[$hours][0] . ' часов';
			} else if($minutes == 15) {
				return 'Четверть ' . $hourWords[$hours + 1][2];
			} else if($minutes == 30) {
				return 'Половина ' . $hourWords[$hours + 1][2];
			} else if($minutes == 45) {
				return 'Без четверти ' . $hourWords[$hours + 1][2];
			} else if($minutes < 30) {
				$minuteString = $minuteWords[$minutes];
				if($minutes == 1 || $minutes == 11) {
					$minuteString .= ' минута';
				} else if(($minutes >= 2 && $minutes <= 4) || ($minutes >= 22 && $minutes <= 24)) {
					$minuteString .= ' минуты';
				} else {
					$minuteString .= ' минут';
				}
				return $minuteString . ' после ' . $hourWords[$hours][1];
			} else {
				$minutes = 60 - $minutes;
				$minuteString = $minuteWords[$minutes];

				if($minutes == 1 || $minutes == 11) {
					$minuteString .= ' минута';
				} else if(($minutes >= 2 && $minutes <= 4) || ($minutes >= 22 && $minutes <= 24)) {
					$minuteString .= ' минуты';
				} else {
					$minuteString .= ' минут';
				}

				if($hours == 12) {
					return $minuteString . ' до ' . $hourWords[1][1];
				}

				return $minuteString . ' до ' . $hourWords[$hours+1][1];
			}
		}

	}