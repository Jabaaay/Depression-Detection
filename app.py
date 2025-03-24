from flask import Flask, request, jsonify
from flask_cors import CORS

app = Flask(__name__)
CORS(app)  # Allow Laravel frontend to access Flask API

# Structured questions with answers
questions = [
    {
        "id": 1,
        "title": "Sadness",
        "options": [
            {"text": "I do not feel sad.", "value": 0},
            {"text": "I feel sad much of the time.", "value": 1},
            {"text": "I am sad all the time.", "value": 2},
            {"text": "I am so sad or unhappy that I can't stand it.", "value": 3}
        ]
    },
    {
        "id": 2,
        "title": "Pessimism",
        "options": [
            {"text": "I am not discouraged about my future.", "value": 0},
            {"text": "I feel more discouraged about my future than I used to.", "value": 1},
            {"text": "I do not expect things to work out for me.", "value": 2},
            {"text": "I feel my future is hopeless and will only get worse.", "value": 3}
        ]
    },
    {
        "id": 3,
        "title": "Past Failure",
        "options": [
            {"text": "I do not feel like a failure.", "value": 0},
            {"text": "I have failed more than I should have.", "value": 1},
            {"text": "As I look back, I see a lot of failures.", "value": 2},
            {"text": "I feel I am a total failure as a person.", "value": 3}
        ]
    },
    {
        "id": 4,
        "title": "Loss of Pleasure",
        "options": [
            {"text": "I get as much pleasure as I ever did from the things I enjoy.", "value": 0},
            {"text": "I don't enjoy things as much as I used to.", "value": 1},
            {"text": "I get very little pleasure from the things I used to enjoy.", "value": 2},
            {"text": "I can't get any pleasure from the things I used to enjoy.", "value": 3}
        ]
    },
    {
        "id": 5,
        "title": "Guilty Feelings",
        "options": [
            {"text": "I don't feel particularly guilty.", "value": 0},
            {"text": "I feel guilty over many things I have done or should have done.", "value": 1},
            {"text": "I feel quite guilty most of the time.", "value": 2},
            {"text": "I feel guilty all of the time.", "value": 3}
        ]
    },
    {
        "id": 6,
        "title": "Punishment Feelings",
        "options": [
            {"text": "I don't feel I am being punished.", "value": 0},
            {"text": "I feel I may be punished.", "value": 1},
            {"text": "I expect to be punished.", "value": 2},
            {"text": "I feel I am being punished.", "value": 3}
        ]
    },
    {
        "id": 7,
        "title": "Self-Dislike",
        "options": [
            {"text": "I feel the same about myself as ever.", "value": 0},
            {"text": "I have lost confidence in myself.", "value": 1},
            {"text": "I am disappointed in myself.", "value": 2},
            {"text": "I dislike myself.", "value": 3}
        ]
    },
    {
        "id": 8,
        "title": "Self-Criticalness",
        "options": [
            {"text": "I don't criticize or blame myself more than usual.", "value": 0},
            {"text": "I am more critical of myself than I used to be.", "value": 1},
            {"text": "I criticize myself for all of my faults.", "value": 2},
            {"text": "I blame myself for everything bad that happens.", "value": 3}
        ]
    },
    {
        "id": 9,
        "title": "Suicidal Thoughts or Wishes",
        "options": [
            {"text": "I don't have any thoughts of killing myself.", "value": 0},
            {"text": "I have thoughts of killing myself, but I would not carry them out.", "value": 1},
            {"text": "I would like to kill myself.", "value": 2},
            {"text": "I would kill myself if I had the chance.", "value": 3}
        ]
    },
    {
        "id": 10,
        "title": "Crying",
        "options": [
            {"text": "I don't cry anymore than I used to.", "value": 0},
            {"text": "I cry more than I used to.", "value": 1},
            {"text": "I cry over every little thing.", "value": 2},
            {"text": "I feel like crying, but I can't.", "value": 3}
        ]
    },
    {
    "id": 11,
    "title": "Agitation",
    "options": [
        {"text": "I am no more restless or wound up than usual.", "value": 0},
        {"text": "I feel more restless or wound up than usual.", "value": 1},
        {"text": "I am so restless or agitated, it's hard to stay still.", "value": 2},
        {"text": "I am so restless or agitated that I have to keep moving or doing something.", "value": 3}
    ]
    },
    {
        "id": 12,
        "title": "Loss of Interest",
        "options": [
            {"text": "I have not lost interest in other people or activities.", "value": 0},
            {"text": "I am less interested in other people or things than before.", "value": 1},
            {"text": "I have lost most of my interest in other people or things.", "value": 2},
            {"text": "It's hard to get interested in anything.", "value": 3}
        ]
    },
    {
        "id": 13,
        "title": "Indecisiveness",
        "options": [
            {"text": "I make decisions about as well as ever.", "value": 0},
            {"text": "I find it more difficult to make decisions than usual.", "value": 1},
            {"text": "I have much greater difficulty in making decisions than I used to.", "value": 2},
            {"text": "I have trouble making any decisions.", "value": 3}
        ]
    },
    {
        "id": 14,
        "title": "Worthlessness",
        "options": [
            {"text": "I do not feel I am worthless.", "value": 0},
            {"text": "I don't consider myself as worthwhile and useful as I used to.", "value": 1},
            {"text": "I feel more worthless as compared to others.", "value": 2},
            {"text": "I feel utterly worthless.", "value": 3}
        ]
    },
    {
        "id": 15,
        "title": "Loss of Energy",
        "options": [
            {"text": "I have as much energy as ever.", "value": 0},
            {"text": "I have less energy than I used to have.", "value": 1},
            {"text": "I don't have enough energy to do very much.", "value": 2},
            {"text": "I don't have enough energy to do anything.", "value": 3}
        ]
    },
    {
        "id": 16,
        "title": "Changes in Sleeping Pattern",
        "options": [
            {"text": "I have not experienced any change in my sleeping.", "value": 0},
            {"text": "I sleep somewhat more than usual.", "value": 1, "variant": "a"},
            {"text": "I sleep somewhat less than usual.", "value": 1, "variant": "b"},
            {"text": "I sleep a lot more than usual.", "value": 2, "variant": "a"},
            {"text": "I sleep a lot less than usual.", "value": 2, "variant": "b"},
            {"text": "I sleep most of the day.", "value": 3, "variant": "a"},
            {"text": "I wake up 1-2 hours early and can't get back to sleep.", "value": 3, "variant": "b"}
        ]
    },
    {
        "id": 17,
        "title": "Irritability",
        "options": [
            {"text": "I am not more irritable than usual.", "value": 0},
            {"text": "I am more irritable than usual.", "value": 1},
            {"text": "I am much more irritable than usual.", "value": 2},
            {"text": "I am irritable all the time.", "value": 3}
        ]
    },
    {
        "id": 18,
        "title": "Changes in Appetite",
        "options": [
            {"text": "I have not experienced any change in my appetite.", "value": 0},
            {"text": "My appetite is somewhat less than usual.", "value": 1, "variant": "a"},
            {"text": "My appetite is somewhat greater than usual.", "value": 1, "variant": "b"},
            {"text": "My appetite is much less than before.", "value": 2, "variant": "a"},
            {"text": "My appetite is much greater than usual.", "value": 2, "variant": "b"},
            {"text": "I have no appetite at all.", "value": 3, "variant": "a"},
            {"text": "I crave food all the time.", "value": 3, "variant": "b"}
        ]
    },
    {
        "id": 19,
        "title": "Concentration Difficulty",
        "options": [
            {"text": "I can concentrate as well as ever.", "value": 0},
            {"text": "I can't concentrate as well as usual.", "value": 1},
            {"text": "It's hard to keep my mind on anything for very long.", "value": 2},
            {"text": "I find I can't concentrate on anything.", "value": 3}
        ]
    },
    {
        "id": 20,
        "title": "Tiredness or Fatigue",
        "options": [
            {"text": "I am no more tired or fatigued than usual.", "value": 0},
            {"text": "I get more tired or fatigued more easily than usual.", "value": 1},
            {"text": "I am too tired or fatigued to do a lot of the things I used to do.", "value": 2},
            {"text": "I am too tired or fatigued to do most of the things I used to do.", "value": 3}
        ]
    },
    {
        "id": 21,
        "title": "Loss of Interest in Sex",
        "options": [
            {"text": "I have not noticed any recent change in my interest in sex.", "value": 0},
            {"text": "I am less interested in sex than I used to be.", "value": 1},
            {"text": "I am much less interested in sex now.", "value": 2},
            {"text": "I have lost interest in sex completely.", "value": 3}
        ]
    }


]


@app.route('/next-question', methods=['POST'])
def next_question():
    current_id = request.json.get('current_id', 0)  # Get the current question ID
    next_q = next((q for q in questions if q["id"] > current_id), None)

    if next_q:
        return jsonify(next_q)
    else:
        return jsonify({"message": "Exam Finished", "status": "done"})

if __name__ == '__main__':
    app.run(debug=True, port=5000)
