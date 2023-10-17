 <?php
    require_once "database/config.php";
    class Model
    {
    protected $db;

        function __construct()
        {
            $this->db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
            $this->deploy();
        }


        function deploy()
        {
            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll(); 
            if (count($tables) == 0) {
                $sql = <<<END
                CREATE TABLE `categorys` (
                    `id_categoria` int(11) NOT NULL,
                    `nombre` varchar(50) NOT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                  
                  --
                  -- Volcado de datos para la tabla `categorys`
                  --
                  
                  INSERT INTO `categorys` (`id_categoria`, `nombre`) VALUES
                  (1, 'Buzo'),
                  (2, 'Remera'),
                  (3, 'Pantalon');
                  
                  -- --------------------------------------------------------
                  
                  --
                  -- Estructura de tabla para la tabla `products`
                  --
                  
                  CREATE TABLE `products` (
                    `id_producto` int(11) NOT NULL,
                    `nombre_producto` varchar(45) NOT NULL,
                    `precio` float NOT NULL,
                    `id_categoria` int(11) NOT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                  
                  --
                  -- Volcado de datos para la tabla `products`
                  --
                  
                  INSERT INTO `products` (`id_producto`, `nombre_producto`, `precio`, `id_categoria`) VALUES
                  (1, 'Hoodie Essentials', 20000, 1),
                  (2, 'Pantalon Levis', 22999, 3),
                  (3, 'Hoodie Nike Air Jordan', 30000, 1),
                  (4, 'Remera Nike Basic', 15000, 2),
                  (7, 'Remera Adidas Originals', 15000, 2),
                  (8, 'Hoodie Nike Jumpman', 35000, 1),
                  (9, 'Hoodie Fear Of God', 40000, 1),
                  (10, 'Pantalon Fear Of God', 20000, 3),
                  (11, 'Remera Jordan Flight MVP', 20000, 2),
                  (12, 'Pantalon Jordan Flight MVP', 22000, 3),
                  (14, 'Pantalon Cargo Nike', 20000, 3),
                  (15, 'Pantalon Cargo KOTK', 20000, 3),
                  (16, 'Remera Nike Dri-Fit', 18000, 2),
                  (18, 'Hoodie Vans', 25000, 1),
                  (19, 'Remera Jordan The Shoes', 20000, 2),
                  (20, 'Pantalon Cargo Adidas', 20000, 3),
                  (21, 'Pantalon Recto Zara', 20000, 3),
                  (22, 'Remera Zara Basics', 15000, 2),
                  (23, 'Hoodie The North Face', 40000, 1),
                  (28, 'Remera Nike Sportswear All Nike', 20000, 2),
                  (29, 'Remera Nike Sportswear Max90', 20000, 2),
                  (30, 'Remera BMW x PUMA', 25000, 2);
                  
                  -- --------------------------------------------------------
                  
                  --
                  -- Estructura de tabla para la tabla `usuarios`
                  --
                  
                  CREATE TABLE `usuarios` (
                    `id_usuario` int(11) NOT NULL,
                    `usuario` varchar(200) NOT NULL,
                    `contraseña` varchar(200) NOT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                  
                  --
                  -- Volcado de datos para la tabla `usuarios`
                  --
                  
                  INSERT INTO `usuarios` (`id_usuario`, `usuario`, `contraseña`) VALUES
                  (2, 'webadmin', '$2y$10$3Kbqmf86cgTwGGUN6YHmBuld0hZtyoPdbyEPU8BHbJ8Y0M9VfZmdS');
                  
                  --
                  -- Índices para tablas volcadas
                  --
                  
                  --
                  -- Indices de la tabla `categorys`
                  --
                  ALTER TABLE `categorys`
                    ADD PRIMARY KEY (`id_categoria`);
                  
                  --
                  -- Indices de la tabla `products`
                  --
                  ALTER TABLE `products`
                    ADD PRIMARY KEY (`id_producto`),
                    ADD KEY `id_categoria` (`id_categoria`);
                  
                  --
                  -- Indices de la tabla `usuarios`
                  --
                  ALTER TABLE `usuarios`
                    ADD PRIMARY KEY (`id_usuario`);
                  
                  --
                  -- AUTO_INCREMENT de las tablas volcadas
                  --
                  
                  --
                  -- AUTO_INCREMENT de la tabla `categorys`
                  --
                  ALTER TABLE `categorys`
                    MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
                  
                  --
                  -- AUTO_INCREMENT de la tabla `products`
                  --
                  ALTER TABLE `products`
                    MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
                  
                  --
                  -- AUTO_INCREMENT de la tabla `usuarios`
                  --
                  ALTER TABLE `usuarios`
                    MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
                  
                  --
                  -- Restricciones para tablas volcadas
                  --
                  
                  --
                  -- Filtros para la tabla `products`
                  --
                  ALTER TABLE `products`
                    ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorys` (`id_categoria`);
                  COMMIT;
                END;
                $this->db->query($sql);
            }
        }
    }