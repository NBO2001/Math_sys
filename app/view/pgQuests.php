{% extends "/themes/themeBase.php" %}

{% block bory %}

<main class="quests">

    <span id="result"></span>
    {{ contets|raw }}
    <button onclick="ctnResu()"> Finalizar</button>

</main>

{% endblock %}
