<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder {
    public function run() {
        $questions = [
            [
                'title' => 'Sadness',
                'options' => json_encode([
                    ["text" => "I do not feel sad.", "value" => 0],
                    ["text" => "I feel sad much of the time.", "value" => 1],
                    ["text" => "I am sad all the time.", "value" => 2],
                    ["text" => "I am so sad or unhappy that I can't stand it.", "value" => 3]
                ])
            ],
            [
                'title' => 'Pessimism',
                'options' => json_encode([
                    ["text" => "I am not discouraged about my future.", "value" => 0],
                    ["text" => "I feel more discouraged about my future than I used to.", "value" => 1],
                    ["text" => "I do not expect things to work out for me.", "value" => 2],
                    ["text" => "I feel my future is hopeless and will only get worse.", "value" => 3]
                ])
            ],
            [
                'title' => 'Past Failure',
                'options' => json_encode([
                    ["text" => "I do not feel like a failure.", "value" => 0],
                    ["text" => "I have failed more than I should have.", "value" => 1],
                    ["text" => "As I look back, I see a lot of failures.", "value" => 2],
                    ["text" => "I feel I am a total failure as a person.", "value" => 3]
                ])
            ],
            [
                'title' => 'Loss of Pleasure',
                'options' => json_encode([
                    ["text" => "I get as much pleasure as I ever did from the things I enjoy.", "value" => 0],
                    ["text" => "I don't enjoy things as much as I used to.", "value" => 1],
                    ["text" => "I get very little pleasure from the things I used to enjoy.", "value" => 2],
                    ["text" => "I can't get any pleasure from the things I used to enjoy.", "value" => 3]
                ])
            ],
            [
                'title' => 'Guilty Feelings',
                'options' => json_encode([
                    ["text" => "I don't feel particularly guilty.", "value" => 0],
                    ["text" => "I feel guilty over many things I have done or should have done.", "value" => 1],
                    ["text" => "I feel quite guilty most of the time.", "value" => 2],
                    ["text" => "I feel guilty all of the time.", "value" => 3]
                ])
            ],
            [
                'title' => 'Punishment Feelings',
                'options' => json_encode([
                    ["text" => "I don't feel I am being punished.", "value" => 0],
                    ["text" => "I feel I may be punished.", "value" => 1],
                    ["text" => "I expect to be punished.", "value" => 2],
                    ["text" => "I feel I am being punished.", "value" => 3]
                ])
            ],
            [
                'title' => 'Self-Dislike',
                'options' => json_encode([
                    ["text" => "I feel the same about myself as ever.", "value" => 0],
                    ["text" => "I have lost confidence in myself.", "value" => 1],
                    ["text" => "I am disappointed in myself.", "value" => 2],
                    ["text" => "I dislike myself.", "value" => 3]
                ])
            ],
            [
                'title' => 'Self-Criticalness',
                'options' => json_encode([
                    ["text" => "I don't criticize or blame myself more than usual.", "value" => 0],
                    ["text" => "I am more critical of myself than I used to be.", "value" => 1],
                    ["text" => "I criticize myself for all of my faults.", "value" => 2],
                    ["text" => "I blame myself for everything bad that happens.", "value" => 3]
                ])
            ],
            [
                'title' => 'Suicidal Thoughts or Wishes',
                'options' => json_encode([
                    ["text" => "I don't have any thoughts of killing myself.", "value" => 0],
                    ["text" => "I have thoughts of killing myself, but I would not carry them out.", "value" => 1],
                    ["text" => "I would like to kill myself.", "value" => 2],
                    ["text" => "I would kill myself if I had the chance.", "value" => 3]
                ])
            ],
            [
                'title' => 'Crying',
                'options' => json_encode([
                    ["text" => "I don't cry anymore than I used to.", "value" => 0],
                    ["text" => "I cry more than I used to.", "value" => 1],
                    ["text" => "I cry over every little thing.", "value" => 2],
                    ["text" => "I feel like crying, but I can't.", "value" => 3]
                ])
                ],
                [
                    'title' => 'Agitation',
                    'options' => json_encode([
                        ["text" => "I am no more restless or wound up than usual.", "value" => 0],
                        ["text" => "I feel more restless or wound up than usual.", "value" => 1],
                        ["text" => "I am so restless or agitated, it's hard to stay still.", "value" => 2],
                        ["text" => "I am so restless or agitated that I have to keep moving or doing something.", "value" => 3]
                    ])
                ],
                [
                    'title' => 'Loss of Interest',
                    'options' => json_encode([
                        ["text" => "I have not lost interest in other people or activities.", "value" => 0],
                        ["text" => "I am less interested in other people or things than before.", "value" => 1],
                        ["text" => "I have lost most of my interest in other people or things.", "value" => 2],
                        ["text" => "It's hard to get interested in anything.", "value" => 3]
                    ])
                ],
                [
                    'title' => 'Indecisiveness',
                    'options' => json_encode([
                        ["text" => "I make decisions about as well as ever.", "value" => 0],
                        ["text" => "I find it more difficult to make decisions than usual.", "value" => 1],
                        ["text" => "I have much greater difficulty in making decisions than I used to.", "value" => 2],
                        ["text" => "I have trouble making any decisions.", "value" => 3]
                    ])
                ],
                [
                    'title' => 'Worthlessness',
                    'options' => json_encode([
                        ["text" => "I do not feel I am worthless.", "value" => 0],
                        ["text" => "I don't consider myself as worthwhile and useful as I used to.", "value" => 1],
                        ["text" => "I feel more worthless as compared to others.", "value" => 2],
                        ["text" => "I feel utterly worthless.", "value" => 3]
                    ])
                ],
                [
                    'title' => 'Loss of Energy',
                    'options' => json_encode([
                        ["text" => "I have as much energy as ever.", "value" => 0],
                        ["text" => "I have less energy than I used to have.", "value" => 1],
                        ["text" => "I don't have enough energy to do very much.", "value" => 2],
                        ["text" => "I don't have enough energy to do anything.", "value" => 3]
                    ])
                ]
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
