<html>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <h1>Artikel Terbaru</h1>

    <!-- Digunakan foreach untuk menampilkan datanya satu persatu -->
    <?php foreach ($blogs as $key => $blog) : ?>
        <div class="blog">
            <h2>
                <a href="<?= site_url('blog/detail/' . $blog['url']); ?>">
                    <?= $blog['title']; ?>
                </a>
            </h2>
            <?= $blog['content']; ?>
        </div>
    <?php endforeach; ?>
</body>

</html>