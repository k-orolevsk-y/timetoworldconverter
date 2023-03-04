<?php
	namespace Me\Korolevsky;

	require './TimeToWorldConvertingInterface.php';
	require './TimeToWorldConverter.php';
	require './vendor/autoload.php';

	use PHPUnit\Framework\TestCase;

	class TimeToWorldConverterTest extends TestCase {

		private $converter;

		protected function setUp(): void {
			$this->converter = new TimeToWorldConverter();
		}

		protected function tearDown(): void {
			$this->converter = null;
		}

		public function testSevenOClock() {
			$this->assertEquals("Семь часов", $this->converter->convert(7, 0));
		}

		public function testOneMinutePastSeven() {
			$this->assertEquals("Одна минута после семи", $this->converter->convert(7, 1));
		}

		public function testThreeMinutesPastSeven() {
			$this->assertEquals("Три минуты после семи", $this->converter->convert(7, 3));
		}

		public function testTwelveMinutesPastSeven() {
			$this->assertEquals("Двенадцать минут после семи", $this->converter->convert(7, 12));
		}

		public function testQuarterPastSeven() {
			$this->assertEquals("Четверть восьмого", $this->converter->convert(7, 15));
		}

		public function testTwentyTwoMinutesPastSeven() {
			$this->assertEquals("Двадцать две минуты после семи", $this->converter->convert(7, 22));
		}

		public function testHalfPastSeven() {
			$this->assertEquals("Половина восьмого", $this->converter->convert(7, 30));
		}

		public function testTwentyFiveMinutesToEight() {
			$this->assertEquals("Двадцать пять минут до восьми", $this->converter->convert(7, 35));
		}

		public function testNineteenMinutesToEight() {
			$this->assertEquals("Девятнадцать минут до восьми", $this->converter->convert(7, 41));
		}

		public function testFourMinutesToEight() {
			$this->assertEquals("Четыре минуты до восьми", $this->converter->convert(7, 56));
		}

		public function testOneMinuteToEight() {
			$this->assertEquals("Одна минута до восьми", $this->converter->convert(7, 59));
		}

		public function testTwentyFiveMinutesToTwelve() {
			$this->assertEquals("Двадцать пять минут до одного", $this->converter->convert(12, 35));
		}
	}
