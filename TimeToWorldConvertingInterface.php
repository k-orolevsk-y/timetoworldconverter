<?php
	namespace Me\Korolevsky;

	interface TimeToWorldConvertingInterface {
		public function convert(int $hours, int $minutes): string;
	}