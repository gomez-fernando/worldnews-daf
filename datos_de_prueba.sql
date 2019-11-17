USE worldnews;

-- INSERTS--------------------------------------

--
-- insert into 'users'
--

INSERT INTO `users` VALUES(NULL, 'Juan', 'Rivas', 'juanjo207', 'journalist', 'active', 'juan@juan.com', '+34 675938528', '$2y$12$/KpQiMmVlvKXFTCZOQxtX.rilC7/bAONlGKtJ7vZJWv/KrM9EwSbu', curtime(), curtime(), NULL),
                          (NULL, 'Luis', 'Sandoval', 'administrador 1', 'admin', 'active', 'admin@admin.com', '+34 634078326', '$2y$12$/KpQiMmVlvKXFTCZOQxtX.rilC7/bAONlGKtJ7vZJWv/KrM9EwSbu', curtime(), curtime(), NULL),
                          (NULL, 'Jaime', 'Roca', 'editor 1', 'editor', 'active', 'editor@editor.com', '+34 634078326', '$2y$12$/KpQiMmVlvKXFTCZOQxtX.rilC7/bAONlGKtJ7vZJWv/KrM9EwSbu', curtime(), curtime(), NULL),
                        (NULL, 'nombre1', 'apellido1', 'username1', 'journalist', 'active', 'user1@user1.com', '+34 634078326', '$2y$12$/KpQiMmVlvKXFTCZOQxtX.rilC7/bAONlGKtJ7vZJWv/KrM9EwSbu', curtime(), curtime(), NULL);

--
-- insert into 'sections'
--

INSERT INTO `sections` VALUES(NULL, 2, 'Política Nacional', 'active', curtime(), curtime()),
                             (NULL, 2, 'Política Internacional', 'active', curtime(), curtime()),
                             (NULL, 2, 'Economía', 'active', curtime(), curtime()),
                            (NULL, 2, 'Deportes', 'active', curtime(), curtime());


--
-- insert into 'articles'
--

INSERT INTO `articles` VALUES(NULL, 1, NULL, 4, 'Final de la Copa del Rey', 'sub título del artículo', 'copadelrey.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pretium sapien id sem scelerisque, in fermentum nibh tempor. In auctor ligula in nunc malesuada convallis. Nulla venenatis iaculis elit et venenatis. Nulla ac velit egestas, sagittis sem vestibulum, auctor justo. Suspendisse sit amet posuere felis. In tempus odio ut quam vehicula, non dictum sem hendrerit. Cras non vulputate magna, vitae facilisis nibh. Etiam aliquet, turpis at porta mattis, nisl leo pellentesque libero, nec convallis purus felis in eros. Maecenas vel nisi ipsum. Sed porttitor est sit amet placerat congue. ', 'kw1;wk2;kw3', 'final-de-la-copa-del-rey', 'in process', null, curtime(), curtime(), curtime());
INSERT INTO `articles` VALUES(NULL, 1, NULL, 2, 'El PP apuesta por nuevas elecciones y activa la maquinaria del partido', 'Insiste en una alianza electoral con Cs ante la previsión de otros comicios', 'politica-01.jpg', 'El PP entra en modo campaña. Y ha dado ya los primeros pasos para activar la maquinaria electoral: la dirección del partido contempla, en previsión de una repetición electoral el 10-N, reforzar su estructura en las 28 circunscripciones que reparten cinco diputados o menos, donde la competencia de Vox hizo mella en abril. La insistencia en aliarse con Ciudadanos demuestra que en Génova piensan que la probabilidad de nuevas elecciones es muy elevada. Tras firmar el peor resultado del PP, y con Ciudadanos a la baja en las encuestas, Pablo Casado pretende consolidarse en el bloque de la derecha si el PSOE no desencalla la investidura.', 'pp;elecciones', 'El-PP-apuesta-por-nuevas-elecciones', 'published', null, curtime(), curtime(), curtime());
INSERT INTO `articles` VALUES(NULL, 1, NULL, 2, 'Torra insiste en su desafío y dice que trabajará “sin tregua” por la independencia', 'El president reclama a Pedro Sánchez "un diálogo de tú a tú, hablando de todo"', 'politica-02.jpg', 'La víspera de acudir al juicio que se celebrará este lunes en el Tribunal Superior de Justicia de Cataluña para ser juzgado por un delito de desobediencia, el presidente de la Generalitat, Quim Torra, ha insistido este domingo en su desafío al Estado. En un mensaje en Twitter con motivo de cumplir año y medio en el cargo, Torra ha declarado su "compromiso para trabajar, sin tregua, para culminar el proceso de independencia". El mandatario catalán recuerda que cuando prometió el cargo lo hizo "con fidelidad a la voluntad del pueblo de Cataluña representada en el Parlament".', 'torra;catalunya;independencia', 'Torra-insiste-en-su-desafío-independentista', 'published', null, curtime(), curtime(), curtime());
INSERT INTO `articles` VALUES(NULL, 1, NULL, 2, 'Zapatero, sobre el acuerdo entre PSOE y Unidas Podemos: “Deseaba que se produjera”', 'El expresidente del Gobierno apuesta por un diálogo en Cataluña donde se puedan plantear todas las alternativas', 'politica-03.jpg', 'El expresidente del Gobierno José Luis Rodríguez Zapatero ha asegurado que “deseaba” que se produjera el preacuerdo de Gobierno con el que PSOE y Unidas Podemos. “El acuerdo con el que nos han sorprendido esta semana me ha parecido muy bien. Yo deseaba que se produjera”, ha asegurado este domingo el expresidente del Ejecutivo en una entrevista en el programa de la cadena SER A vivir que son dos días.', 'psoe;zapatero;podemos', 'Zapatero-sobre-el-acuerdo-entre-PSOE-y-Unidas-Podemos', 'in process', null, curtime(), curtime(), curtime());

--
-- insert into 'deleted_articles'
--

INSERT INTO `deleted_articles` VALUES(NULL, 1, 2, 1, 'Final de la copa del rey', 'sub título del artículo', 'copadelrey.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pretium sapien id sem scelerisque, in fermentum nibh tempor. In auctor ligula in nunc malesuada convallis. Nulla venenatis iaculis elit et venenatis. Nulla ac velit egestas, sagittis sem vestibulum, auctor justo. Suspendisse sit amet posuere felis. In tempus odio ut quam vehicula, non dictum sem hendrerit. Cras non vulputate magna, vitae facilisis nibh. Etiam aliquet, turpis at porta mattis, nisl leo pellentesque libero, nec convallis purus felis in eros. Maecenas vel nisi ipsum. Sed porttitor est sit amet placerat congue. ', 'kw1;kw2;kw3', 'final-de-la-copa-del-rey', 'published', curtime(), curtime());




