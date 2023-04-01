@extends('layouts.app')

@section('content')
    {{ Form::open(['route' => 'diary_write']) }}
    <div class="mx-20 px-20 py-20 rounded-2xl">

        <h3 class="text-center text-xl pt-8 ">今日出来たこと</h3>
        <p class="text-xs text-center text-green-600 mt-1">一度に最大10件まで登録できます</p>

        <div class="bg-green-100 rounded-2xl">
            <div id="input1" class="done1  write_margin p-6">
                <div class="side_header">
                    <input id="1" class="write_input mr-5" name="done1" type="text">

                    <div class="rate-form1 ml-5">
                        <input id="form1_star3" type="radio" name="rate1" value="3">
                        <label for="form1_star3">★</label>
                        <input id="form1_star2" type="radio" name="rate1" value="2">
                        <label for="form1_star2">★</label>
                        <input id="form1_star1" type="radio" name="rate1" value="1" checked>
                        <label for="form1_star1">★</label>
                    </div>
                </div>
            </div>

            <div id="input2" class="done2  write_margin p-6 hidden_js none_js">
                <div class="side_header">
                    <input id="2" class="write_input mr-5" name="done2" type="text">

                    <div class="rate-form2 ml-5">
                        <input id="form2_star3" type="radio" name="rate2" value="3">
                        <label for="form2_star3">★</label>
                        <input id="form2_star2" type="radio" name="rate2" value="2">
                        <label for="form2_star2">★</label>
                        <input id="form2_star1" type="radio" name="rate2" value="1" checked>
                        <label for="form2_star1">★</label>
                    </div>
                </div>
            </div>

            <div id="input3" class="done3  write_margin p-6 hidden_js none_js">
                <div class="side_header">
                    <input id="3" class="write_input mr-5" name="done3" type="text">

                    <div class="rate-form3 ml-5">
                        <input id="form3_star3" type="radio" name="rate3" value="3">
                        <label for="form3_star3">★</label>
                        <input id="form3_star2" type="radio" name="rate3" value="2">
                        <label for="form3_star2">★</label>
                        <input id="form3_star1" type="radio" name="rate3" value="1" checked>
                        <label for="form3_star1">★</label>
                    </div>
                </div>
            </div>

            <div id="input4" class="done4  write_margin p-6 hidden_js none_js">
                <div class="side_header">
                    <input id="4" class="write_input mr-5" name="done4" type="text">

                    <div class="rate-form4 ml-5">
                        <input id="form4_star3" type="radio" name="rate4" value="3">
                        <label for="form4_star3">★</label>
                        <input id="form4_star2" type="radio" name="rate4" value="2">
                        <label for="form4_star2">★</label>
                        <input id="form4_star1" type="radio" name="rate4" value="1" checked>
                        <label for="form4_star1">★</label>
                    </div>
                </div>
            </div>

            <div id="input5" class="done5  write_margin p-6 hidden_js none_js">
                <div class="side_header">
                    <input id="5" class="write_input mr-5" name="done5" type="text">

                    <div class="rate-form5 ml-5">
                        <input id="form5_star3" type="radio" name="rate5" value="3">
                        <label for="form5_star3">★</label>
                        <input id="form5_star2" type="radio" name="rate5" value="2">
                        <label for="form5_star2">★</label>
                        <input id="form5_star1" type="radio" name="rate5" value="1" checked>
                        <label for="form5_star1">★</label>
                    </div>
                </div>
            </div>

            <div id="input6" class="done6  write_margin p-6 hidden_js none_js">
                <div class="side_header">
                    <input id="6" class="write_input mr-5" name="done6" type="text">

                    <div class="rate-form6 ml-5">
                        <input id="form6_star3" type="radio" name="rate6" value="3">
                        <label for="form6_star3">★</label>
                        <input id="form6_star2" type="radio" name="rate6" value="2">
                        <label for="form6_star2">★</label>
                        <input id="form6_star1" type="radio" name="rate6" value="1" checked>
                        <label for="form6_star1">★</label>
                    </div>
                </div>
            </div>

            <div id="input7" class="done7  write_margin p-6 hidden_js none_js">
                <div class="side_header">
                    <input id="7" class="write_input mr-5" name="done7" type="text">

                    <div class="rate-form7 ml-5">
                        <input id="form7_star3" type="radio" name="rate7" value="3">
                        <label for="form7_star3">★</label>
                        <input id="form7_star2" type="radio" name="rate7" value="2">
                        <label for="form7_star2">★</label>
                        <input id="form7_star1" type="radio" name="rate7" value="1" checked>
                        <label for="form7_star1">★</label>
                    </div>
                </div>
            </div>

            <div id="input8" class="done8  write_margin p-6 hidden_js none_js">
                <div class="side_header">
                    <input id="8" class="write_input mr-5" name="done8" type="text">

                    <div class="rate-form8 ml-5">
                        <input id="form8_star3" type="radio" name="rate8" value="3">
                        <label for="form8_star3">★</label>
                        <input id="form8_star2" type="radio" name="rate8" value="2">
                        <label for="form8_star2">★</label>
                        <input id="form8_star1" type="radio" name="rate8" value="1" checked>
                        <label for="form8_star1">★</label>
                    </div>
                </div>
            </div>

            <div id="input9" class="done9  write_margin p-6 hidden_js none_js">
                <div class="side_header">
                    <input id="9" class="write_input mr-5" name="done9" type="text">

                    <div class="rate-form9 ml-5">
                        <input id="form9_star3" type="radio" name="rate9" value="3">
                        <label for="form9_star3">★</label>
                        <input id="form9_star2" type="radio" name="rate9" value="2">
                        <label for="form9_star2">★</label>
                        <input id="form9_star1" type="radio" name="rate9" value="1" checked>
                        <label for="form9_star1">★</label>
                    </div>
                </div>
            </div>

            <div id="input10" class="done10  write_margin p-6 hidden_js none_js">
                <div class="side_header">
                    <input id="10" class="write_input mr-5" name="done10" type="text">

                    <div class="rate-form10 ml-5">
                        <input id="form10_star3" type="radio" name="rate10" value="3">
                        <label for="form10_star3">★</label>
                        <input id="form10_star2" type="radio" name="rate10" value="2">
                        <label for="form10_star2">★</label>
                        <input id="form10_star1" type="radio" name="rate10" value="1" checked>
                        <label for="form10_star1">★</label>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="text-center text-xl pt-8">今日の出来事</h3>
        <p class="text-xs text-center text-green-600 mt-1">一度に最大10件まで登録できます</p>
        <div class="bg-green-100 rounded-2xl">
            <div id="input21" class="event1  write_margin p-6">
                <div class="side_header">
                    <input id="21" class="write_input mr-5" name="event1" type="text">

                    <div class="ml-5 rate-event1">
                        <input id="event1_angry" type="radio" name="event1_rate" value="3">
                        <label for="event1_angry"><img src=".\img\angry.png" alt=""></label>
                        <input id="event1_fanny" type="radio" name="event1_rate" value="4">
                        <label for="event1_fanny"><img src=".\img\fanny.png" alt=""></label>
                        <input id="event1_cry" type="radio" name="event1_rate" value="1">
                        <label for="event1_cry"><img src=".\img\cry.png" alt=""></label>
                        <input id="event1_peace" type="radio" name="event1_rate" value="2">
                        <label for="event1_peace"><img src=".\img\peace.png" alt=""></label>
                    </div>
                </div>
            </div>

            <div id="input22" class="event2  write_margin p-6 hidden_js none_js">
                <div class="side_header">
                    <input id="22" class="write_input mr-5" name="event2" type="text">

                    <div class="ml-5 rate-event2">
                        <input id="event2_angry" type="radio" name="event2_rate" value="3">
                        <label for="event2_angry"><img src=".\img\angry.png" alt=""></label>
                        <input id="event2_fanny" type="radio" name="event2_rate" value="4">
                        <label for="event2_fanny"><img src=".\img\fanny.png" alt=""></label>
                        <input id="event2_cry" type="radio" name="event2_rate" value="1">
                        <label for="event2_cry"><img src=".\img\cry.png" alt=""></label>
                        <input id="event2_peace" type="radio" name="event2_rate" value="2">
                        <label for="event2_peace"><img src=".\img\peace.png" alt=""></label>
                    </div>
                </div>
            </div>

            <div id="input23" class="event3  write_margin p-6 hidden_js none_js">
                <div class="side_header">
                    <input id="23" class="write_input mr-5" name="event3" type="text">

                    <div class="ml-5 rate-event3">
                        <input id="event3_angry" type="radio" name="event3_rate" value="3">
                        <label for="event3_angry"><img src=".\img\angry.png" alt=""></label>
                        <input id="event3_fanny" type="radio" name="event3_rate" value="4">
                        <label for="event3_fanny"><img src=".\img\fanny.png" alt=""></label>
                        <input id="event3_cry" type="radio" name="event3_rate" value="1">
                        <label for="event3_cry"><img src=".\img\cry.png" alt=""></label>
                        <input id="event3_peace" type="radio" name="event3_rate" value="2">
                        <label for="event3_peace"><img src=".\img\peace.png" alt=""></label>
                    </div>
                </div>
            </div>

            <div id="input24" class="event4  write_margin p-6 hidden_js none_js">
                <div class="side_header">
                    <input id="24" class="write_input mr-5" name="event4" type="text">

                    <div class="ml-5 rate-event4">
                        <input id="event4_angry" type="radio" name="event4_rate" value="3">
                        <label for="event4_angry"><img src=".\img\angry.png" alt=""></label>
                        <input id="event4_fanny" type="radio" name="event4_rate" value="4">
                        <label for="event4_fanny"><img src=".\img\fanny.png" alt=""></label>
                        <input id="event4_cry" type="radio" name="event4_rate" value="1">
                        <label for="event4_cry"><img src=".\img\cry.png" alt=""></label>
                        <input id="event4_peace" type="radio" name="event4_rate" value="2">
                        <label for="event4_peace"><img src=".\img\peace.png" alt=""></label>
                    </div>
                </div>
            </div>

            <div id="input25" class="event5  write_margin p-6 hidden_js none_js">
                <div class="side_header">
                    <input id="25" class="write_input mr-5" name="event5" type="text">

                    <div class="ml-5 rate-event5">
                        <input id="event5_angry" type="radio" name="event5_rate" value="3">
                        <label for="event5_angry"><img src=".\img\angry.png" alt=""></label>
                        <input id="event5_fanny" type="radio" name="event5_rate" value="4">
                        <label for="event5_fanny"><img src=".\img\fanny.png" alt=""></label>
                        <input id="event5_cry" type="radio" name="event5_rate" value="1">
                        <label for="event5_cry"><img src=".\img\cry.png" alt=""></label>
                        <input id="event5_peace" type="radio" name="event5_rate" value="2">
                        <label for="event5_peace"><img src=".\img\peace.png" alt=""></label>
                    </div>
                </div>
            </div>

            <div id="input26" class="event6  write_margin p-6 hidden_js none_js">
                <div class="side_header">
                    <input id="26" class="write_input mr-5" name="event6" type="text">

                    <div class="ml-5 rate-event6">
                        <input id="event6_angry" type="radio" name="event6_rate" value="3">
                        <label for="event6_angry"><img src=".\img\angry.png" alt=""></label>
                        <input id="event6_fanny" type="radio" name="event6_rate" value="4">
                        <label for="event6_fanny"><img src=".\img\fanny.png" alt=""></label>
                        <input id="event6_cry" type="radio" name="event6_rate" value="1">
                        <label for="event6_cry"><img src=".\img\cry.png" alt=""></label>
                        <input id="event6_peace" type="radio" name="event6_rate" value="2">
                        <label for="event6_peace"><img src=".\img\peace.png" alt=""></label>
                    </div>
                </div>
            </div>

            <div id="input27" class="event7  write_margin p-6 hidden_js none_js">
                <div class="side_header">
                    <input id="27" class="write_input mr-5" name="event7" type="text">

                    <div class="ml-5 rate-event7">
                        <input id="event7_angry" type="radio" name="event7_rate" value="3">
                        <label for="event7_angry"><img src=".\img\angry.png" alt=""></label>
                        <input id="event7_fanny" type="radio" name="event7_rate" value="4">
                        <label for="event7_fanny"><img src=".\img\fanny.png" alt=""></label>
                        <input id="event7_cry" type="radio" name="event7_rate" value="1">
                        <label for="event7_cry"><img src=".\img\cry.png" alt=""></label>
                        <input id="event7_peace" type="radio" name="event7_rate" value="2">
                        <label for="event7_peace"><img src=".\img\peace.png" alt=""></label>
                    </div>
                </div>
            </div>

            <div id="input28" class="event8  write_margin p-6 hidden_js none_js">
                <div class="side_header">
                    <input id="28" class="write_input mr-5" name="event8" type="text">

                    <div class="ml-5 rate-event8">
                        <input id="event8_angry" type="radio" name="event8_rate" value="3">
                        <label for="event8_angry"><img src=".\img\angry.png" alt=""></label>
                        <input id="event8_fanny" type="radio" name="event8_rate" value="4">
                        <label for="event8_fanny"><img src=".\img\fanny.png" alt=""></label>
                        <input id="event8_cry" type="radio" name="event8_rate" value="1">
                        <label for="event8_cry"><img src=".\img\cry.png" alt=""></label>
                        <input id="event8_peace" type="radio" name="event8_rate" value="2">
                        <label for="event8_peace"><img src=".\img\peace.png" alt=""></label>
                    </div>
                </div>
            </div>

            <div id="input29" class="event9  write_margin p-6 hidden_js none_js">
                <div class="side_header">
                    <input id="29" class="write_input mr-5" name="event9" type="text">

                    <div class="ml-5 rate-event9">
                        <input id="event9_angry" type="radio" name="event9_rate" value="3">
                        <label for="event9_angry"><img src=".\img\angry.png" alt=""></label>
                        <input id="event9_fanny" type="radio" name="event9_rate" value="4">
                        <label for="event9_fanny"><img src=".\img\fanny.png" alt=""></label>
                        <input id="event9_cry" type="radio" name="event9_rate" value="1">
                        <label for="event9_cry"><img src=".\img\cry.png" alt=""></label>
                        <input id="event9_peace" type="radio" name="event9_rate" value="2">
                        <label for="event9_peace"><img src=".\img\peace.png" alt=""></label>
                    </div>
                </div>
            </div>

            <div id="input20" class="event10  write_margin p-6 hidden_js none_js">
                <div class="side_header">
                    <input id="20" class="write_input mr-5" name="event10" type="text">

                    <div class="ml-5 rate-event10">
                        <input id="event10_angry" type="radio" name="event10_rate" value="3">
                        <label for="event10_angry"><img src=".\img\angry.png" alt=""></label>
                        <input id="event10_fanny" type="radio" name="event10_rate" value="4">
                        <label for="event10_fanny"><img src=".\img\fanny.png" alt=""></label>
                        <input id="event10_cry" type="radio" name="event10_rate" value="1">
                        <label for="event10_cry"><img src=".\img\cry.png" alt=""></label>
                        <input id="event10_peace" type="radio" name="event10_rate" value="2">
                        <label for="event10_peace"><img src=".\img\peace.png" alt=""></label>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="text-center text-xl pt-8 pb-3">一緒に記録する文章があればここに書いてね！</h3>

        <div class="other">
            <textarea name="other" id="other" cols="30" rows="10"></textarea>
        </div>

<div class="text-center">
            <button class="w-4/12 p-3 rounded-xl m-10 bg-green-400">日記を保存する</button>
        </div>

        {{ Form::close() }}
    </div>
@endsection
