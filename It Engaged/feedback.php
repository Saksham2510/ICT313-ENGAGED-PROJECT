<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="feedback.css">
</head>
<body>
    <div class="container">
        <form action="submit_feedback.php" method="POST">
            <h2>Feedback Form</h2>

            <!-- Updated Date Input with custom styling -->
            <div class="input-group">
                <label for="date-of-use">Date of website use</label>
                <input type="date" id="date-of-use" name="date-of-use" required>
                <p class="note">Please take some time for your feedback which helps us to improve.</p>
            </div>

            <!-- Questions Section -->
            <div class="questions">
                <div class="question">
                    <label>This website helps to find jobs.</label>
                    <div class="options">
                        <label><input type="radio" name="q1" value="Strongly agree" required> Strongly agree </label>
                        <label><input type="radio" name="q1" value="Agree"> Agree </label>
                        <label><input type="radio" name="q1" value="Neutral"> Neutral </label>
                        <label><input type="radio" name="q1" value="Disagree"> Disagree </label>
                        <label><input type="radio" name="q1" value="Strongly Disagree"> Strongly Disagree </label>
                    </div>
                </div>

                <div class="question">
                    <label>Issues faced while using the website were easy to resolve.</label>
                    <div class="options">
                        <label><input type="radio" name="q2" value="Strongly Agree" required> Strongly Agree </label>
                        <label><input type="radio" name="q2" value="Agree"> Agree </label>
                        <label><input type="radio" name="q2" value="Neutral"> Neutral </label>
                        <label><input type="radio" name="q2" value="Disagree"> Disagree </label>
                        <label><input type="radio" name="q2" value="Strongly Disagree"> Strongly Disagree </label>
                    </div>
                </div>

                <div class="question">
                    <label>Using the website was a positive experience for me.</label>
                    <div class="options">
                        <label><input type="radio" name="q3" value="Strongly Agree" required> Strongly Agree </label>
                        <label><input type="radio" name="q3" value="Agree"> Agree </label>
                        <label><input type="radio" name="q3" value="Neutral"> Neutral </label>
                        <label><input type="radio" name="q3" value="Disagree"> Disagree </label>
                        <label><input type="radio" name="q3" value="Strongly Disagree"> Strongly Disagree </label>
                    </div>
                </div>

                <div class="question">
                    <label>I had no trouble accessing the website.</label>
                    <div class="options">
                        <label><input type="radio" name="q4" value="Strongly Agree" required> Strongly Agree </label>
                        <label><input type="radio" name="q4" value="Agree"> Agree </label>
                        <label><input type="radio" name="q4" value="Neutral"> Neutral </label>
                        <label><input type="radio" name="q4" value="Disagree"> Disagree </label>
                        <label><input type="radio" name="q4" value="Strongly Disagree"> Strongly Disagree </label>
                    </div>
                </div>

                <div class="question">
                    <label>I would like to use this website in the future as well.</label>
                    <div class="options">
                        <label><input type="radio" name="q5" value="Strongly Agree" required> Strongly Agree </label>
                        <label><input type="radio" name="q5" value="Agree"> Agree </label>
                        <label><input type="radio" name="q5" value="Neutral"> Neutral </label>
                        <label><input type="radio" name="q5" value="Disagree"> Disagree </label>
                        <label><input type="radio" name="q5" value="Strongly Disagree"> Strongly Disagree </label>
                    </div>
                </div>

                <div class="question">
                    <label>This platform helps in different aspects like learning and getting counseling.</label>
                    <div class="options">
                        <label><input type="radio" name="q6" value="Strongly Agree" required> Strongly Agree </label>
                        <label><input type="radio" name="q6" value="Agree"> Agree </label>
                        <label><input type="radio" name="q6" value="Neutral"> Neutral </label>
                        <label><input type="radio" name="q6" value="Disagree"> Disagree </label>
                        <label><input type="radio" name="q6" value="Strongly Disagree"> Strongly Disagree </label>
                    </div>
                </div>
            </div>
<!-- Feedback Section -->
            <div class="input-group">
                <label for="feedback">Provide feedback</label>
                <textarea id="feedback" name="feedback" rows="4" style="width: 100%;" required></textarea>
            </div>
			
			
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
