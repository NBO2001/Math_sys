<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="js/vrQuests.js"></script>
    {% block head %}
    {% endblock %}
</head>

<body>
    {% block bory %}
    {% endblock %}
    <div id="modal-overlay" onclick="hideModal()">
        <div id="modal-content" onclick="event.stopPropagation();">
            <div id="modal-message"></div>
            <button onclick="hideModal()">OK</button>
        </div>
    </div>
</body>

    {% block javasc %}
    {% endblock %}

<footer class="cop">
        &copy;N.B.O 2020
</footer>
</html>