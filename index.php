<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HUB Principal</title>

    <link rel="stylesheet" href="css/style.css">

    <style>
        .container{
            max-width: 900px;
            margin: 80px auto;
            text-align: center;
        }

        .container h1{
            margin-bottom: 40px;
        }

        .cards{
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .card{
            width: 240px;
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,.15);
            transition: .3s;
        }

        .card:hover{
            transform: translateY(-5px);
        }

        .card h2{
            margin-bottom: 15px;
            color: #2c3e50;
        }

        .card p{
            margin-bottom: 25px;
            color: #666;
        }

        .btn{
            display: inline-block;
            padding: 12px 20px;
            background: #2c3e50;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: .3s;
        }

        .btn:hover{
            background: #1d2935;
        }
    </style>

</head>
<body>

<div class="container">

    <h1>📚 Sistema de Loja de Mangás</h1>

    <div class="cards">

        <div class="card">
            <h2>📖 Mangás</h2>
            <p>Visualize todos os mangás disponíveis para compra.</p>

            <a class="btn" href="manga/listaManga.php">
                Ver Mangás
            </a>
        </div>

        <div class="card">
            <h2>🏬 Lojas</h2>
            <p>Confira todas as lojas cadastradas no sistema.</p>

            <a class="btn" href="loja/listaLoja.php">
                Ver Lojas
            </a>
        </div>

        <div class="card">
            <h2>🛒 Comprar</h2>
            <p>Realize uma compra escolhendo um mangá e uma loja.</p>

            <a class="btn" href="pedidos/comprar.php">
                Comprar
            </a>
        </div>

        <div class="card">
            <h2>📖 Lista de Devolução</h2>
            <p>Visualize todos os mangás disponíveis para devolução.</p>

            <a class="btn" href="pedidos/listaDevolucao.php">
                Ver Mangás
            </a>
        </div>

    </div>

</div>

</body>
</html>