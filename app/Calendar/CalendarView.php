<?php

namespace App\Calendar;

use Carbon\Carbon;
use App\Calendar\CalendarJobs;
use App\Calendar\CalendarWeekDay;

class CalendarView
{

	private $carbon;

	function __construct($date)
	{
		$this->carbon = new Carbon($date);
	}
	/**
	 * タイトル
	 */
	public function getTitle()
	{
		return $this->carbon->format('Y年n月');
	}

	protected function getWeeks()
	{
		$weeks = [];

		//初日
		$firstDay = $this->carbon->copy()->firstOfMonth();

		//月末まで
		$lastDay = $this->carbon->copy()->lastOfMonth();

		//1週目
		$week = new CalendarWeek($firstDay->copy());
		$weeks[] = $week;

		//作業用の日
		$tmpDay = $firstDay->copy()->addDay(7)->startOfWeek();

		//月末までループさせる
		while ($tmpDay->lte($lastDay)) {
			//週カレンダーViewを作成する
			$week = new CalendarWeek($tmpDay, count($weeks));
			$weeks[] = $week;

			//次の週=+7日する
			$tmpDay->addDay(7);
		}

		return $weeks;
	}

	/**
	 * カレンダーを出力する
	 */
	function render()
	{
		$html = [];
		$html[] = '<div class="calendar">';
		$html[] = '<table class="table">';
		$html[] = '<thead>';
		$html[] = '<tr>';
		$html[] = '<th>月</th>';
		$html[] = '<th>火</th>';
		$html[] = '<th>水</th>';
		$html[] = '<th>木</th>';
		$html[] = '<th>金</th>';
		$html[] = '<th>土</th>';
		$html[] = '<th>日</th>';
		$html[] = '</tr>';
		$html[] = '</thead>';

		$html[] = '<tbody>';

		$weeks = $this->getWeeks();
		foreach ($weeks as $week) {
			$html[] = '<tr class="' . $week->getClassName() . '">';
			$days = $week->getDays();

			$calendar_job = new CalendarJobs($this->carbon->copy());
			$jobs = $calendar_job->JobArray();



			foreach ($days as $day) {

				$html[] = '<td class="' . $day->getClassName() . '">';
				if ($day instanceof \App\Calendar\CalendarWeekBlankDay) {
					$html[] = '';
				} else {
					$html[] = $day->render();

					if ($day) {
						
						$num = $day->getCarbon()->copy()->format('d');

						if (isset($jobs[(int)$num])) {
							$total_feeling = array_column(json_decode($jobs[(int)$num]), 'total_feeling');
							$id = array_column(json_decode($jobs[(int)$num]), 'id');

							if (isset($total_feeling[0])) {
								if ($total_feeling[0] == 1) {
									$html[] = "<div class='detail_form'>";
									$html[] = "<form method='post' action='".route('detail')."'>";
									$html[] = csrf_field();
									$html[] = '<input type="hidden" name="id" value='.$id[0].'>';
									$html[] = '<button type="submit" > <img src=".\img\good.png"/ width="50" hight="50"></button>';
									$html[] = '</form>';
									$html[] = "</div>";
								}else{
									$html[] = "<div class='detail_form'>";
									$html[] = "<form method='post' action='".route('detail')."'>";
									$html[] = csrf_field();
									$html[] = '<input type="hidden" name="id" value='.$id[0].'>';
									$html[] = '<button type="submit" > <img src=".\img\bad.png"/ width="50" hight="50"></button>';
									$html[] = '</form>';
									$html[] = "</div>";
								}
							}
						}
					}
				}
				$html[] = '</td>';
			}
			$html[] = '</tr>';
		}

		$html[] = '</tbody>';
		$html[] = '</table>';
		$html[] = '</div>';
		return implode("", $html);
	}

	/**
	 * 次の月
	 */
	public function getNextMonth(){
		return $this->carbon->copy()->addMonthsNoOverflow()->format('Y-m');
	}
	/**
	 * 前の月
	 */
	public function getPreviousMonth(){
		return $this->carbon->copy()->subMonthsNoOverflow()->format('Y-m');
	}
}
