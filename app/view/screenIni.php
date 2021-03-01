{% extends "/themes/themeBase.php" %}

{% block bory %}
<body>
    <main class = 'form-conf-questoes'>
        <div>
            <form action="/questoes" method="post">
            <div class='quntForm'>

                <input type="number" name="quantA" id="" placeholder="Ex.: 1" min="1">
                <label> Até </label>
                <input type="number" name="quantB" id="" placeholder="Ex.: 999" min="1">
            
            </div>

            <div class="inputForm" id='quantidade-operation'>

                <input type="text" class='operationInput' name="operation[]" id="" placeholder="Operação, Ex.: +" min="1">
                <input class='operationInput' type='number' name='quant[]' placeholder='Quantidade de questões' min='1'>
            
            </div>
            
            <input class='btnsForm' type="submit" name='todosAleatory' value="Send" />
        </form>
        </div>
        <button class='btnsForm' onclick="addField()">Add</button>
    </main>
{% endblock %}

{% block javasc %}
<script>
    function addField(){
        var ct = document.getElementById("quantidade-operation").innerHTML;
        var con = "<input class='operationInput' type='text' name='operation[]'  placeholder='Operação, Ex.: +' min='1'>";
        con = con + "<input class='operationInput' type='number' name='quant[]' placeholder='Quantidade de questões' min='1'>"
        
        document.getElementById("quantidade-operation").innerHTML = ct + con;
    }
</script>
{% endblock %}
