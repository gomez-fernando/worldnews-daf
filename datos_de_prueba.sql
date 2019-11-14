USE worldnews;

-- INSERTS--------------------------------------

--
-- insert into 'users'
--

INSERT INTO `users` VALUES(NULL, 'Juan', 'Rivas', 'juanjo207', 'journalist', 'active', 'juan@juan.com', '+34 675938528', '$2y$12$/KpQiMmVlvKXFTCZOQxtX.rilC7/bAONlGKtJ7vZJWv/KrM9EwSbu', curtime(), curtime(), NULL),
                          (2, 'Luis', 'Sandoval', 'administrador 1', 'admin', 'active', 'admin@admin.com', '+34 634078326', '$2y$12$/KpQiMmVlvKXFTCZOQxtX.rilC7/bAONlGKtJ7vZJWv/KrM9EwSbu', curtime(), curtime(), NULL),
                          (3, 'Jaime', 'Roca', 'editor 1', 'editor', 'active', 'editor@editor.com', '+34 634078326', '$2y$12$/KpQiMmVlvKXFTCZOQxtX.rilC7/bAONlGKtJ7vZJWv/KrM9EwSbu', curtime(), curtime(), NULL);

--
-- insert into 'sections'
--

INSERT INTO `sections` VALUES(NULL, 2, 'Deportes', 'active', curtime(), curtime()),
                             (NULL, 2, 'Política Nacional', 'active', curtime(), curtime()),
                             (NULL, 2, 'Economía', 'active', curtime(), curtime());

--
-- insert into 'articles'
--

INSERT INTO `articles` VALUES(NULL, 1, NULL, 1, 'Final de la Copa del Rey', 'sub título del artículo', 'copadelrey.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pretium sapien id sem scelerisque, in fermentum nibh tempor. In auctor ligula in nunc malesuada convallis. Nulla venenatis iaculis elit et venenatis. Nulla ac velit egestas, sagittis sem vestibulum, auctor justo. Suspendisse sit amet posuere felis. In tempus odio ut quam vehicula, non dictum sem hendrerit. Cras non vulputate magna, vitae facilisis nibh. Etiam aliquet, turpis at porta mattis, nisl leo pellentesque libero, nec convallis purus felis in eros. Maecenas vel nisi ipsum. Sed porttitor est sit amet placerat congue. ', 'kw1;wk2;kw3', 'final-de-la-copa-del-rey', 'in process', null, curtime(), curtime(), curtime());

--
-- insert into 'deleted_articles'
--

INSERT INTO `deleted_articles` VALUES(NULL, 1, 2, 1, 'Final de la copa del rey', 'sub título del artículo', 'copadelrey.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pretium sapien id sem scelerisque, in fermentum nibh tempor. In auctor ligula in nunc malesuada convallis. Nulla venenatis iaculis elit et venenatis. Nulla ac velit egestas, sagittis sem vestibulum, auctor justo. Suspendisse sit amet posuere felis. In tempus odio ut quam vehicula, non dictum sem hendrerit. Cras non vulputate magna, vitae facilisis nibh. Etiam aliquet, turpis at porta mattis, nisl leo pellentesque libero, nec convallis purus felis in eros. Maecenas vel nisi ipsum. Sed porttitor est sit amet placerat congue. ', 'kw1;kw2;kw3', 'final-de-la-copa-del-rey', 'published', curtime(), curtime());




