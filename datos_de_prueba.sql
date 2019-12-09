USE worldnews;

-- INSERTS--------------------------------------

--
-- insert into 'users'
--

INSERT INTO `users` VALUES(NULL, 'Juan', 'Rivas', 'juanjo207', 'journalist', 'activo', 'juan@juan.com', '+34 675938528', '$2y$12$/KpQiMmVlvKXFTCZOQxtX.rilC7/bAONlGKtJ7vZJWv/KrM9EwSbu', curtime(), curtime(), NULL),
                          (NULL, 'Luis', 'Sandoval', 'administrador 1', 'admin', 'activo', 'admin@admin.com', '+34 634078326', '$2y$12$/KpQiMmVlvKXFTCZOQxtX.rilC7/bAONlGKtJ7vZJWv/KrM9EwSbu', curtime(), curtime(), NULL),
                          (NULL, 'Jaime', 'Roca', 'editor 1', 'editor', 'activo', 'editor@editor.com', '+34 634078326', '$2y$12$/KpQiMmVlvKXFTCZOQxtX.rilC7/bAONlGKtJ7vZJWv/KrM9EwSbu', curtime(), curtime(), NULL),
                          (NULL, 'nombre1', 'apellido1', 'username1', 'journalist', 'activo', 'user1@user1.com', '+34 634078326', '$2y$12$/KpQiMmVlvKXFTCZOQxtX.rilC7/bAONlGKtJ7vZJWv/KrM9EwSbu', curtime(), curtime(), NULL);

--
-- insert into 'sections'
--

INSERT INTO `sections` VALUES(NULL, 2, 'Política Nacional', 'activo', curtime(), curtime()),
                             (NULL, 2, 'Política Internacional', 'activo', curtime(), curtime()),
                             (NULL, 2, 'Economía', 'activo', curtime(), curtime()),
                             (NULL, 2, 'Deportes', 'activo', curtime(), curtime());


--
-- insert into 'articles'
--

INSERT INTO `articles` VALUES(NULL, 1, NULL, 4, 'Final de la Copa del Rey', 'El Valencia gana la Copa; la "traca final" le explota al Barça', 'copadelrey.jpg', '<p><strong>Valencia va a quemar muchas tracas</strong>&nbsp;tras ganar al Bar&ccedil;a la final de la&nbsp;<a href="http://www.rtve.es/temas/copa-del-rey/2550/">Copa del Rey</a>&nbsp;1-2. Un broche de oro a la temporada en la que el club che celebra su centenario; otro golpe para los azulgrana despu&eacute;s del reciente mazazo de Anfield.</p>

<p>Los de Marcelino han hecho un partido muy ordenado en defensa y aprovecharon sus oportunidades ante el&nbsp;<strong>equipo de Valverde, que estuvo muy gris</strong>.&nbsp;</p>

<p>Los cuatro primeros minutos de control total de la posesi&oacute;n por parte del Bar&ccedil;a. Sin embargo, la primera gran ocasi&oacute;n la tuvo el Valencia. Lenglet cometi&oacute; un error garrafal. Rodrigo se present&oacute; ante Cillesen y solo la intervenci&oacute;n de&nbsp;<strong>Piqu&eacute; bajo los palos&nbsp;</strong>salv&oacute; un gol cantado.</p>

<p>Los azulgrana retomaron de inmediato la batuta, con&nbsp;<strong>Semedo como el jugador que m&aacute;s intentaba</strong>&nbsp;desbordar. El portugu&eacute;s se hab&iacute;a quedado fuera de muchas quinielas para el once de la final y quiso aprovechar su oportunidad.</p>

<p>Pero los de Valverde no generaron realmente peligro hasta el minuto 17, cuando Messi se sac&oacute; un disparo en cuanto pis&oacute; con el bal&oacute;n el &aacute;rea rival.</p>

<p>Por el contrario, los che&nbsp;<strong>golpearon a la contra</strong>. La jugada la inici&oacute; Gabriel&nbsp;<strong>Paulista con una gran apertura&nbsp;</strong>a la banda izquierda; Gay&aacute; control&oacute; el pase largo y asisti&oacute; a la frontal para que Gameiro mandara su chut al fondo de la red. 0-1 en el ecuador de la priemera parte.</p>

<p>El partido no volvi&oacute; a ser el mismo. Los valencianistas se vinieron arriba y poco despu&eacute;s del peque&ntilde;o descanso para hidratarse por el intenso calor,&nbsp;<strong>Carlos Soler desbord&oacute; por el carril izquierdo a Alba&nbsp;</strong>y&nbsp;su pase, casi de la muerte, lo aprovech&oacute; Rodrigo con un remate picado de cabeza.</p>

<p>El segundo tanto lleg&oacute; justo cuando ca&iacute;a el &uacute;ltimo rayo de sol sobre el fondo sur del Villamar&iacute;n. Precisamente el que ocupaba la afici&oacute;n blaugrana.</p>

<p><strong>Se hac&iacute;a de noche tambi&eacute;n metaf&oacute;ricamente para los catalanes</strong>. Aunque en el &uacute;ltimo minuto tuvieron dos ocasiones, con sendos tiros de Messi y Rakitic que par&oacute; Domenech.</p>

<h3>Poca reacci&oacute;n</h3>

<p>En el descanso Valverde intent&oacute; la reacci&oacute;n con dos cambios. Por momentos parece que surtieron. De hecho, tras la reanudaci&oacute;n Messi tuvo mucho m&aacute;s protagonismo. Dispuso de un libre directo en la frontal (lo desvi&oacute; la barrera), y en el 55 estrell&oacute; un disparo con rosca en el palo.</p>

<p>Pasada la hora de partido, el Valencia sufr&iacute;a un contratiempo con la&nbsp;<strong>lesi&oacute;n de Parejo</strong>. Y a falta de casi 20 minutos el m&aacute;s importante, ya que el Bar&ccedil;a recort&oacute; distancias de c&oacute;rner. Lenglet cabece&oacute; a la cepa del poste, Domenech no pudo atraparla y el rechace le cay&oacute; a Messi, que pr&aacute;cticamente solo tuvo que poner la pierna.</p>

<p>Volv&iacute;a la emoci&oacute;n y el Villamar&iacute;n vivi&oacute; por fin el ambientazo propio de su primera final, con ambas aficiones volcadas en animar a los suyos (y no en otras cosas). .</p>

<p>Pero el resultado ya no cambi&oacute; a pesar de que con el Bar&ccedil;a volcado al ataque Guedes fall&oacute; un mano a mano con Cillesen y otra incluso&nbsp;<strong>a puerta vac&iacute;a</strong>.&nbsp;</p>

<p>Los nervios estuvieron a punto de costarle caro, porque los cul&eacute;s tambi&eacute;n tuvieron una ocasi&oacute;n tras una larga prolongaci&oacute;n, pero como en todo el encuentro, no tuvieron&nbsp;acierto.</p>

<p>La victoria da el primer t&iacute;tulo a&nbsp;los valencianos en una d&eacute;cada.&nbsp;<strong>El anterior que levant&oacute; fue tambi&eacute;n la Copa</strong>, en 2008. 11 a&ntilde;os despu&eacute;s, las tracas van a volver a retumbar en la capital del Turia por culpa del f&uacute;tbol.</p>

<p>En Barcelona, en cambio, el ruido seguramente ser&aacute; m&aacute;s molesto.</p>', 'final de copa; 2019; copa del rey; valencia; barça', 'final-de-la-copa-del-rey', 'publicado', null, curtime(), curtime(), curtime());
INSERT INTO `articles` VALUES(NULL, 1, NULL, 1, 'El PP apuesta por nuevas elecciones y activa la maquinaria del partido', 'Insiste en una alianza electoral con Cs ante la previsión de otros comicios', 'politica-01.jpg', 'El PP entra en modo campaña. Y ha dado ya los primeros pasos para activar la maquinaria electoral: la dirección del partido contempla, en previsión de una repetición electoral el 10-N, reforzar su estructura en las 28 circunscripciones que reparten cinco diputados o menos, donde la competencia de Vox hizo mella en abril. La insistencia en aliarse con Ciudadanos demuestra que en Génova piensan que la probabilidad de nuevas elecciones es muy elevada. Tras firmar el peor resultado del PP, y con Ciudadanos a la baja en las encuestas, Pablo Casado pretende consolidarse en el bloque de la derecha si el PSOE no desencalla la investidura.', 'pp;elecciones', 'El-PP-apuesta-por-nuevas-elecciones', 'publicado', null, curtime(), curtime(), curtime());
INSERT INTO `articles` VALUES(NULL, 1, NULL, 1, 'Torra insiste en su desafío y dice que trabajará “sin tregua” por la independencia', 'El president reclama a Pedro Sánchez "un diálogo de tú a tú, hablando de todo"', 'politica-02.jpg', 'La víspera de acudir al juicio que se celebrará este lunes en el Tribunal Superior de Justicia de Cataluña para ser juzgado por un delito de desobediencia, el presidente de la Generalitat, Quim Torra, ha insistido este domingo en su desafío al Estado. En un mensaje en Twitter con motivo de cumplir año y medio en el cargo, Torra ha declarado su "compromiso para trabajar, sin tregua, para culminar el proceso de independencia". El mandatario catalán recuerda que cuando prometió el cargo lo hizo "con fidelidad a la voluntad del pueblo de Cataluña representada en el Parlament".', 'torra;catalunya;independencia', 'Torra-insiste-en-su-desafío-independentista', 'publicado', null, curtime(), curtime(), curtime());
INSERT INTO `articles` VALUES(NULL, 1, NULL, 1, 'Zapatero, sobre el acuerdo entre PSOE y Unidas Podemos: “Deseaba que se produjera”', 'El expresidente del Gobierno apuesta por un diálogo en Cataluña donde se puedan plantear todas las alternativas', 'politica-03.jpg', 'El expresidente del Gobierno José Luis Rodríguez Zapatero ha asegurado que “deseaba” que se produjera el preacuerdo de Gobierno con el que PSOE y Unidas Podemos. “El acuerdo con el que nos han sorprendido esta semana me ha parecido muy bien. Yo deseaba que se produjera”, ha asegurado este domingo el expresidente del Ejecutivo en una entrevista en el programa de la cadena SER A vivir que son dos días.', 'psoe;zapatero;podemos', 'Zapatero-sobre-el-acuerdo-entre-PSOE-y-Unidas-Podemos', 'publicado', null, curtime(), curtime(), curtime());
INSERT INTO `articles` VALUES(NULL, 1, NULL, 3, 'Gxchain realiza la primera donación importante al Blockchain Lab de la Universidad Stony Brook', 'Blockchain Business Lab está ayudando a los estudiantes a avanzar en el aprendizaje sobre esta tecnología', 'economia-01.png', '<p>El propio laboratorio de negocios Blockchain de la Universidad de Stony Brook en el College of Business recibi&oacute; la donaci&oacute;n de 2 a&ntilde;os de la compa&ntilde;&iacute;a de tecnolog&iacute;a de datos GXChain.</p>

<p>&nbsp;</p>

<p>GXChain es el primer donante corporativo del laboratorio blockchain, una compa&ntilde;&iacute;a que lidera la econom&iacute;a de datos global al ayudar a los desarrolladores a crear aplicaciones blockchain que son parte de la creciente industria de blockchain y criptomonedas.</p>

<p>&nbsp;</p>

<p>Blockchain Business Lab se cre&oacute; en 2018 para la investigaci&oacute;n de aplicaciones comerciales de blockchain en medio de la creciente industria de blockchain y criptograf&iacute;a, y recluta estudiantes voluntarios para ayudar en la realizaci&oacute;n de proyectos acad&eacute;micos y de investigaci&oacute;n de la industria.&nbsp;El profesor Danling Jiang, decano asociado de investigaci&oacute;n y desarrollo de la facultad en el College of Business, es codirector del laboratorio con el profesor Stoyan Stoyanov y trabaja con los estudiantes voluntarios para ayudarlos a desarrollar mentalidades de investigaci&oacute;n con respecto a esta tecnolog&iacute;a emergente.</p>

<p>&nbsp;</p>

<p>&ldquo;Queremos que estos estudiantes tengan exposici&oacute;n a esta tecnolog&iacute;a e industria&rdquo;, dijo, &ldquo;a trav&eacute;s de la creaci&oacute;n de networking con personas de este espacio, ya sea haciendo investigaciones relevantes para las empresas en este espacio, y alentar a nuestros estudiantes a crear productos o aplicaciones o un negocio de su propio.</p>

<p>&nbsp;</p>

<p>Blockchain es una tecnolog&iacute;a emergente que se prev&eacute; que revolucionar&aacute; la forma en que se hacen los negocios en la econom&iacute;a moderna y podr&iacute;a aplicarse mucho m&aacute;s all&aacute; de los usos de la criptomoneda.</p>

<p>&nbsp;</p>

<p>Blockchain Business Lab est&aacute; ayudando a los estudiantes a avanzar en el aprendizaje sobre esta tecnolog&iacute;a, aplic&aacute;ndola a otros aspectos de los negocios, como el financiamiento y el comercio a trav&eacute;s de proyectos de investigaci&oacute;n que colaboran con profesores y socios de la industria como BitMart Lab.</p>

<p>&nbsp;</p>

<p>Los estudiantes se ofrecen como voluntarios en estos proyectos para ayudar con la investigaci&oacute;n, como recopilar datos, evaluar el riesgo y el retorno de invertir en el espacio, y comprender las regulaciones financieras relevantes, para estudiar el aspecto comercial de esta industria en crecimiento y c&oacute;mo podr&iacute;a afectar la econom&iacute;a moderna en el futuro cercano.</p>

<p>&nbsp;</p>

<p>Gran parte de esta donaci&oacute;n otorgada por GXChain financiar&aacute; premios de excelencia en investigaci&oacute;n para que los estudiantes reconozcan adecuadamente su arduo trabajo y resultados exitosos en el laboratorio como voluntarios no remunerados.&nbsp;Varios estudiantes han comenzado a crear sus propias empresas utilizando las herramientas que aprendieron, e incluso han regresado al laboratorio como &ldquo;mentores de la industria&rdquo; para dirigir proyectos de investigaci&oacute;n para otros estudiantes.&nbsp;Se alienta a los estudiantes a aprender y crear y comenzar sus negocios o ideas que puedan llevar con ellos.</p>

<p>&nbsp;</p>

<p>&ldquo;A trav&eacute;s de esta exposici&oacute;n y trabajo en equipo, pueden construir una red con profesionales de la industria, investigadores y entre ellos, y potencialmente perseguir futuras carreras en este espacio emergente&rdquo;, agreg&oacute; el profesor Jiang.&nbsp;&ldquo;Nuestra misi&oacute;n es alentar a los estudiantes a aprender, crear y comenzar sus negocios o ideas que puedan llevar con ellos&rdquo;.</p>

<p>&nbsp;</p>

<p>El art&iacute;culo se reproduce en el College of Business, Stony Brook University&nbsp;<a href="https://www.stonybrook.edu/commcms/business/about/_news/blockchainstory.php" target="_blank">https://www.stonybrook.edu/commcms/business/about/_news/blockchainstory.php</a></p>

<p>&nbsp;</p>', 'bitcoin;criptomonedas;estudiantes;universidad;donacion', 'gxchain-blockchain-universidad-stony-brook', 'publicado', null, curtime(), curtime(), curtime());

INSERT INTO `articles` VALUES(NULL, 1, NULL, 3, 'JPMorgan Chase acusado de manipular el oro y la plata como vulgar "crimen organizado"', 'El Departamento de Justicia tardó un siglo para exponer las legendarias bribonerías inimputables de su hoy primer banco de inversiones JPMorgan Chase', 'economia-02.jpg', '<p>El Departamento de Justicia tard&oacute; un siglo para exponer las legendarias briboner&iacute;as inimputables de su hoy primer banco de inversiones JPMorgan Chase, supremo especulador de los derivados financieros (&#39;hedge funds&#39;), ahora atrapado en su obscena manipulaci&oacute;n de los precios del oro y la plata. &iquest;Viene una revoluci&oacute;n del orden financiero global?</p>

<p>&nbsp;</p>

<p>JPMorgan Chase es considerado como el supremo megabanco que maneja <em>hedge funds</em> en el mundo basados en pura especulaci&oacute;n financierista que forman parte de la panoplia de los ominosos derivados que han alcanzado la escalofriante cifra de <strong>544 millones de millones de d&oacute;lares</strong>: <a href="https://www.bis.org/publ/otc_hy1905.htm" target="_blank">casi tres veces</a> del valor de las bolsas de valores en todo el mundo y que <a href="https://bit.ly/2y7K6uq" target="_blank">equivale a m&aacute;s de seis veces</a> el PIB (Producto Interno Bruto) Global de 87,27 millones de millones de d&oacute;lares.</p>

<p>&nbsp;</p>

<p>Quiz&aacute; est&eacute; por fenecer una de las trasnacionales financieras mas a&ntilde;ejas del planeta con sede en Nueva York que hoy <a href="https://www.jornada.com.mx/2017/06/04/opinion/018o1pol" target="_blank">controlan grandes gigabancos</a> como BlackRock, Vanguard Group y StateStreet.</p>

<p>&nbsp;</p>

<p>JPMorgan Chase constituye el primer banco de EEUU y el sexto en el mundo de acuerdo al <em>ranking</em> de sus activos que <a href="https://www.jpmorganchase.com/corporate/investor-relations/document/2d96e1cf-0805-4cd6-82e9-82dfd00a3dba.pdf" target="_blank">ascienden a 2,73 millones de millones de d&oacute;lares</a>.</p>

<p>&nbsp;</p>

<p>Seg&uacute;n Tyler Durden, de Zero Hedge, el Departamento de Justicia de EEUU acus&oacute; a la mesa de tratativas de metales preciosos (oro y plata) de ser una &quot;empresa criminal&quot;, como un vulgar &quot;equivalente funcional de las mafias&quot;.</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>Zero Hedge se mofa de lo que antes, cuando era expuesto, era se&ntilde;alado como &#39;teor&iacute;a de la conspiraci&oacute;n&#39;.</p>

<p>&nbsp;</p>

<p><a href="https://www.zerohedge.com/markets/three-jpmorgan-traders-charged-massive-gold-market-manipulation-fraud" target="_blank">Los fiscales exhibieron</a> &quot;el masivo esquema de varios a&ntilde;os para manipular el mercado de los contratos futuros de los metales preciosos y la defraudaci&oacute;n de los participantes en el mercado&quot;.</p>

<p>&nbsp;</p>

<p>El Departamento de Justicia acus&oacute; formalmente a tres mercaderes del megabanco: Michael Nowak (anterior mandam&aacute;s de su mesa comercial de metales preciosos), Christopher Jordan (quien se traslad&oacute; luego a Cr&eacute;dit Suisse y a First New York), y a Gregg Smith. El m&aacute;s mafioso de todos, Blythe Masters, ha sido omitido por el momento.</p>

<p>&nbsp;</p>

<p>Brian Benczkowski, asistente del procurador general, coment&oacute; a la prensa que &quot;basado en el hecho de que se trat&oacute; de una conducta que fue extensa en la mesa, que se comprometi&oacute; en miles de episodios en un periodo de ocho a&ntilde;os &mdash;que es precisamente el genero de conducta que el estatuto RICO es dado a castigar&mdash;&quot;.</p>

<p>&nbsp;</p>

<p>El acr&oacute;nimo RICO (Racketeer Influenced and Corrupt Organizations: Organizaciones Corruptas e Influenciadas por los Delincuentes) hace temblar al mas pintado mafioso en EEUU.</p>

<p>&nbsp;</p>

<p>El portal Bloomberg explaya la enmienda RICO: &quot;una ley que permite a los fiscales capturar las &#39;empresas criminales&#39;, como la de las mafias, al incriminar a todos [sic] los miembros de la organizaci&oacute;n por cualquier crimen cometido por un individuo en nombre de la organizaci&oacute;n&quot;. &iquest;Jaque previo al mate?</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&iquest;Ir&aacute;n tan lejos como embargar y/o expropiar los activos de <strong>2,73 millones de millones de d&oacute;lares</strong> y, de paso, fastidiar a sus verdaderos propietarios: los gigabancos BlackRock/Vanguard/State Street?&nbsp;</p>

<p>&nbsp;</p>

<p>El lenguaje usado de los fiscales es exageradamente feroz &mdash;por tratarse de las joyas bancarias estrat&eacute;gicas que gozaron de la permisividad de los Clinton y Obama&mdash;, quienes acusaron a los mercaderes del oro y la plata del banco de operar &quot;una conspiraci&oacute;n [sic] en la conducta de los asuntos de una empresa implicada en el comercio interestatal o for&aacute;neo mediante un patr&oacute;n de actividad del crimen organizado&quot;, lo cual apunta, seg&uacute;n Zero Hedge a una &quot;m&aacute;s profunda acusaci&oacute;n del banco&quot; cuando hasta ahora 12 mercaderes &quot;han sido acusados de conspiraci&oacute;n manipulativa&quot;.</p>

<p>&nbsp;</p>

<p>Benczkowski no se mordi&oacute; la lengua: &quot;Perseguiremos los hechos a donde conduzcan, sea entre las mesas aqu&iacute; o en cualquier otro [sic] banco o arriba [sic] en la instituci&oacute;n financiera misma&quot;.</p>

<p>&nbsp;</p>

<p>Si realmente el Departamento de Justicia es consecuente con lo que ha manifestado, pues pr&aacute;cticamente estar&iacute;amos hablando de <strong>un embargo general de toda la banca de EEUU</strong>: una verdadera revoluci&oacute;n financiera como cuando Roosevelt embarg&oacute; el oro, pero que ahora Trump lo har&iacute;a al rev&eacute;s: embargando los activos bancarios de Wall Street.</p>

<p>&nbsp;</p>

<p>Un golpe de esta magnitud de parte de Trump, en b&uacute;squeda de su atribulada reelecci&oacute;n, lo har&iacute;a inmensamente popular y rebasar&iacute;a a la senadora Elizabeth Warren del Partido Dem&oacute;crata, quien ha crecido gracias a su postura en contra de los excesos de Wall Street.</p>

<p>&nbsp;</p>

<p>&iexcl;La dimensi&oacute;n es enorme!: Trump <strong>estar&iacute;a dando un golpe de Estado Financiero</strong> en el coraz&oacute;n mismo de Wall Street y quiz&aacute; est&eacute; arriesgando su vida, no se diga la de su familia entera.</p>

<p>&nbsp;</p>

<p>De ah&iacute; quiz&aacute; se explique la exagerada ferocidad de sus contrincantes, estimulados por los mega y gigabancos puestos en jaque y que dominan el mercado de Wall Street y buscan defenestrarlo con cualquier pretexto banal o real.</p>

<p>&nbsp;</p>

<p>Benczkowski remat&oacute; que &quot;las acusaciones no deben dejar duda de que el Departamento de Justicia est&aacute; comprometido a perseguir a quienes socavan la confianza del p&uacute;blico inversionista en la integridad de nuestros mercados de materias primas [<em>commodities]</em>&quot;.</p>

<p>&nbsp;</p>

<p>William Sweeney, director asistente a cargo de la oficina de campo en Nueva York del FBI, agreg&oacute; que la manipulaci&oacute;n probablemente impact&oacute; a &quot;mercados correlacionados [sic] y a los clientes del banco que representaron&quot; mediante un &quot;esquema complejo en el comercio de metales preciosos de manera tal que afectaron negativamente el equilibrio natural de la oferta y la demanda&quot;. &iquest;Jaque tambi&eacute;n a la banca europea y latinoamericana?</p>

<p>&nbsp;</p>

<p>Lo mas interesante es el periodo de investigaci&oacute;n de ocho a&ntilde;os que inici&oacute; cuando apenas EEUU llevaba tres a&ntilde;os de su grave <a href="https://mundo.sputniknews.com/america-latina/201809141082001892-aniversario-crisis-financiera-2008-burbuja-inmobiliaria/" target="_blank">crisis financiera de 2008</a>, producto de la <a href="https://mundo.sputniknews.com/radio_al_contado/201809141081990340-eeuu-crisis-aniversario-lehman-brothers/" target="_blank">quiebra de Lehman Brothers</a>, y todav&iacute;a era presidente Obama quien no tuvo el coraje ni la voluntad de poner orden en Wall Street y en los mercados globales.</p>

<p>&nbsp;</p>

<p>No falta quienes aduzcan que se trata de una vendetta de Trump contra sus acosadores y acusadores del fallido Russiagate y que ahora han vuelto a la carga con otras trivialidades que buscan su defenestraci&oacute;n (<em>impeachment</em>) bajo cualquier excusa.</p>

<p>&nbsp;</p>

<p>En forma extra&ntilde;a le han dado mucho juego al fajo de billetes de 20 d&oacute;lares que ten&iacute;a Trump en la bolsa trasera de su pantal&oacute;n. Cabe recordar que en su <a href="https://mundo.sputniknews.com/firmas/201908011088234036-la-entrevista-de-trump-a-playboy-de-hace-29-anos-donde-aflora-ya-su-personalidad/" target="_blank">sonada entrevista a Play Boy</a> de hace 29 a&ntilde;os, Trump, cuando era Dem&oacute;crata antes de convertirse a Republicano, manifest&oacute; que el prefer&iacute;a el efectivo (<em>cash</em>), como casinero que fue, y los bienes ra&iacute;ces, como inversionista inmobiliario en la actualidad, a los juegos financieros burs&aacute;tiles.</p>

<p>&nbsp;</p>

<p>El Departamento de Justicia de EEUU no est&aacute; golpeando a cualquier banco, sino que se fue a la yugular del principal banco global del viejo sistema financiero internacional basado en los &#39;derivados financieros [<em>hedge funds]&#39;</em>, por lo que el haber expuesto la flagrante manipulaci&oacute;n del oro y la plata que <strong>da&ntilde;&oacute; a millones de inversionistas</strong> en EEUU y en el extranjero es probable que signifique el advenimiento de un nuevo orden financiero global apuntalado por el oro y la plata.</p>

<p>&nbsp;</p>

<p>A mi juicio, en caso de una <a href="https://mundo.sputniknews.com/america_del_norte/201906191087682903-trump-lanza-oficialmente-su-campana-para-la-reeleccion-en-2020/" target="_blank">reelecci&oacute;n de Trump</a>, es probable que se est&eacute; preparando la ambientaci&oacute;n id&oacute;nea para impulsar al oro y la plata &mdash;en EEUU ya existi&oacute; incluso un Partido de la Plata en el Siglo XIX &mdash;como baluartes del nuevo sistema financiero internacional, al un&iacute;sono de Rusia/China/India, y que curiosamente form&oacute; parte de la plataforma electoral del Partido Republicano en la elecci&oacute;n presidencial pasada y que sabe mejor que nadie la grave <a href="https://mundo.sputniknews.com/economia/201906201087705861-participacion-dolar-reservas-disminuye-aliados-eeuu-suman-desdolarizacion/" target="_blank">crisis que padece el d&oacute;lar</a>.</p>

<p>&nbsp;</p>', 'investigacion;fraude;bancos;oro', 'gp-morgan-acusado-manipulacion-oro-plata', 'publicado', null, curtime(), curtime(), curtime());
INSERT INTO `articles` VALUES(NULL, 1, NULL, 3, 'La guerra por el dólar que EEUU perdió: ¿surge una nueva fiebre del oro?”', '"El dólar es nuestra moneda y vuestro problema", dijo una vez en broma el secretario del Tesoro de Nixon, John Connally', 'economia-03.jpg', '<p>Los bancos centrales europeos ponen fin a su acuerdo sobre el oro que concluyeron en 1999 en Washington y que ten&iacute;a como objetivo coordinar las ventas del oro. La tendencia de las &uacute;ltimas d&eacute;cadas, cuando los pa&iacute;ses europeos, con EEUU en la vanguardia, activamente se desprend&iacute;an de este metal precioso en el altar del d&oacute;lar, ha cambiado en direcci&oacute;n opuesta.</p>

<p>&nbsp;</p>

<p>A finales del primer semestre, todos los bancos centrales del mundo compraron 374 toneladas de oro, marcando un verdadero hito. Los mayores compradores del metal precioso fueron los bancos centrales de Polonia, Rusia, China y Turqu&iacute;a.&nbsp; De esta manera, protegen sus reservas de oro y divisas de los riesgos asociados con las acciones de los reguladores financieros de EEUU y la Uni&oacute;n Europea, as&iacute; como de la incertidumbre geopol&iacute;tica. Los expertos est&aacute;n seguros que el oro se convierte en &quot;una garant&iacute;a absoluta <a href="https://mundo.sputniknews.com/economia/201811021083157864-rusia-oro-record-bancos-centrales-wgc/" target="_blank">contra los riesgos legales y pol&iacute;ticos</a>&quot;.<br />
&iquest;Pero cuando los pa&iacute;ses se desprendieron del oro y cu&aacute;les fueron las razones?</p>

<p>&nbsp;</p>

<h2>&quot;D&oacute;lar: nuestra moneda &ndash; vuestro problema&quot;</h2>

<p>&nbsp;</p>

<p>El abandono del patr&oacute;n oro comenz&oacute; en 1944. Hace 75 a&ntilde;os, en la ciudad de Bretton Woods, en el estado norteamericano de New Hampshire, delegados de 44 pa&iacute;ses acordaron crear un sistema monetario mundial: el d&oacute;lar estadounidense se convirti&oacute; en <strong>la principal moneda internacional</strong>. Su tasa fue fijada con las reservas de oro de Estados Unidos, que en ese momento eran casi el 70% de todas las reservas del mundo. El precio del metal &quot;amarillo&quot; se fij&oacute; en 35 d&oacute;lares por onza troy. Los pa&iacute;ses miembros manten&iacute;an sus reservas principalmente en forma de oro o en d&oacute;lares, y ten&iacute;an el derecho de vender sus d&oacute;lares a la Reserva Federal de Estados Unidos a cambio de oro al precio oficial.</p>

<p>&nbsp;</p>

<p>Pero con el tiempo result&oacute; claro: en el contexto de la creciente inflaci&oacute;n y el d&eacute;ficit del comercio exterior, EEUU no fue capaz de mantener la paridad del oro en el nivel establecido durante mucho tiempo. La situaci&oacute;n fue agravada por los gastos de EEUU en la guerra de Vietnam. La ca&iacute;da del sistema Bretton Woods fue inminente: gener&oacute; problemas como el dilema de Triffin, el creciente d&eacute;ficit comercial de EEUU, que puso en tela de juicio el uso del d&oacute;lar como moneda de reserva en el sistema financiero internacional.</p>

<p>&nbsp;</p>

<p>El entonces ministro de Econom&iacute;a y Finanzas de Francia, Val&eacute;ry Giscard d&#39;Estaing, abiertamente llamaba el sistema de Bretton Woods <strong>&quot;un privilegio exorbitante&quot;</strong> para los estadounidenses. Los pa&iacute;ses europeos no estaban dispuestos a continuar pagando las emisiones incontroladas de EEUU. Durante su famoso discurso el 4 de febrero de 1965, el entonces presidente franc&eacute;s Charles de Gaulle dijo:</p>

<p>&nbsp;</p>

<p>&nbsp;&quot;Por qu&eacute; habr&iacute;a de permit&iacute;rsele a los pa&iacute;ses m&aacute;s ricos del mundo monopolizar los beneficios de la creaci&oacute;n de reservas internacionales para la financiaci&oacute;n de sus propios d&eacute;ficits? &iquest;Por qu&eacute; habr&iacute;a que participar el Banco de Francia en la financiaci&oacute;n de las pol&iacute;ticas de los EEUU, pol&iacute;ticas en las que Francia no ten&iacute;a voz y con los cuales pod&iacute;a estar en completo desacuerdo?&quot;.</p>

<p>&nbsp;</p>

<p>&quot;El hecho de que muchos pa&iacute;ses, acepten como principio que los d&oacute;lares son tan buenos como el oro, conduce a los estadounidenses a endeudarse de forma gratuita a expensas de otros pa&iacute;ses. Porque lo que EEUU debe, lo paga, al menos en parte, con un dinero que solo ellos pueden emitir. Ante las graves consecuencias que se podr&iacute;an desencadenar en caso de una crisis, creemos que se deben tomar medidas a tiempo para evitarla. Consideramos necesario que el comercio internacional se establezca sobre un patr&oacute;n monetario indiscutible, y que no lleve la marca de un pa&iacute;s en particular. &iquest;Qu&eacute; patr&oacute;n? La verdad es que <strong>no se puede imaginar otro patr&oacute;n que no sea el oro!</strong>&quot;.&nbsp;</p>

<p>&nbsp;</p>

<p>La imposibilidad de EEUU de hacer frente a sus compromisos de convertibilidad monetaria, desat&oacute; en 1968 una verdadera fiebre del oro. Y la empez&oacute; de Gaulle quien decidi&oacute; exigir a EEUU cambiar el oro por los d&oacute;lares acumuladas en el Banco de Francia, algo que garantizaba el acuerdo de Bretton Woods pese a sus desventajas. Fue inminente que otros bancos centrales del mundo empezaron a exigir lo mismo: devolver d&oacute;lares a EEUU a cambio de oro. Pero EEUU no planeaba resistir.</p>

<p>&nbsp;</p>

<p>&quot;El d&oacute;lar es nuestra moneda y vuestro problema&quot;, dijo una vez en broma el secretario del Tesoro de Nixon, John Connally. Pero parece que no era ninguna broma. A finales de julio de 1971, las reservas de oro de Estados Unidos hab&iacute;an ca&iacute;do a un nivel muy bajo. Como respuesta, en 1971 Richard Nixon instaur&oacute; el famoso &quot;Shock econ&oacute;mico&quot;, &nbsp;cancelando unilateralmente los acuerdos de Bretton Woods y suspendiendo la convertibilidad directa del d&oacute;lar estadounidense con respecto al oro. Asimismo, Nixon impuso un arancel temporal de 10 %, forzando al resto de los pa&iacute;ses a revalorizar su moneda. Cinco a&ntilde;os m&aacute;s tarde, en la conferencia de Jamaica de 1976, el nuevo sistema financiero fue establecido oficialmente.</p>

<p>&nbsp;</p>

<h3>Pol&iacute;tica deliberada de contenci&oacute;n del oro</h3>

<p>&nbsp;</p>

<p>Expulsar el oro del mercado financiero y frenar la subida de los precios del oro con el tiempo se convertir&iacute;a en el objetivo principal de EEUU. Lo comprueban las estenograf&iacute;as de la reuni&oacute;n entre el entonces Secretario de Estado de EEUU Henry Kissinger y sus asistentes, <a href="https://history.state.gov/historicaldocuments/frus1969-76v31/d63" target="_blank">publicadas en el sitio web</a> del Departamento de Estado de EEUU:</p>

<p>&nbsp;</p>

<p>&quot;Mr.&nbsp;Enders: Sr. Secretario, es una oportunidad, debemos tratar de negociar y avanzar hacia una desmonetizaci&oacute;n del oro, para comenzar a sacar el oro del sistema. Va en contra de nuestro inter&eacute;s tener oro en el sistema... Aunque todav&iacute;a tenemos reservas sustanciales de oro &mdash;alrededor de 11 mil millones&mdash;, una gran parte del oro oficial del mundo se concentra en Europa Occidental. Esto les da la posici&oacute;n dominante en las reservas mundiales y los medios dominantes para crear reservas.<br />
Secretario&nbsp;Kissinger: &iquest;Pero c&oacute;mo planean hacerlo?</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>Mr.&nbsp;Enders: Hay otra propuesta, que el FMI comience a vender su oro al mercado mundial, y deber&iacute;amos tratar de negociar eso. Eso comenzar&iacute;a la desmonetizaci&oacute;n del oro. [...] Tambi&eacute;n podr&iacute;amos hacerlo menos interesante para ellos si empez&aacute;ramos a <strong>vender nuestro propio oro en el mercado</strong>, y esto les pondr&iacute;a presi&oacute;n&quot;.</p>

<p>&nbsp;</p>

<p>As&iacute; EEUU empez&oacute; a desprenderse del metal precioso activamente, para que los socios europeos hicieran lo mismo. Se vendieron varios cientos de toneladas de las <strong>reservas de oro del Tesoro de EEUU</strong>. Despu&eacute;s siguieron el FMI y los bancos centrales europeos. En cinco a&ntilde;os en total los bancos vendieron 1,23 mil toneladas de metal. En los a&ntilde;os 80, las ventas se detuvieron y se reanudaron s&oacute;lo en los a&ntilde;os 90. As&iacute; ya en diciembre del 2000, el precio de oro cay&oacute; a un m&iacute;nimo hist&oacute;rico de 271 d&oacute;lares. Al mismo tiempo, la posici&oacute;n del d&oacute;lar estadounidense en el mundo alcanz&oacute; su nivel m&aacute;ximo.</p>

<p>&nbsp;</p>

<h3>El F&eacute;nix dorado</h3>

<p>&nbsp;</p>

<p>La situaci&oacute;n cambi&oacute; dr&aacute;sticamente despu&eacute;s de la crisis del 2008, que fue acompa&ntilde;ada no s&oacute;lo de una recesi&oacute;n econ&oacute;mica mundial, sino tambi&eacute;n por la quiebra de las instituciones financieras, que hasta hace poco parec&iacute;an indestructibles.</p>

<p>&nbsp;</p>

<p>En particular, en febrero de 2008, en el Reino Unido fue nacionalizado el banco Northern Rock, un mes m&aacute;s tarde el banco estadounidense Bear Stearns fue comprado por JP Morgan Chase por s&oacute;lo 240 millones de d&oacute;lares, aunque un a&ntilde;o antes su valor se estimaba en m&aacute;s de 30.000 millones de d&oacute;lares, y en el verano del mismo a&ntilde;o, la Reserva Federal de los EE.UU. se vio obligada a salvar a las compa&ntilde;&iacute;as hipotecarias Fannie Mae y Freddie Mac. La crisis culmin&oacute; con la quiebra de Lehman Brothers, uno de los principales conglomerados financieros del mundo.<br />
En esas circunstancias, los bancos centrales tuvieron que pensar de nuevo sobre la diversificaci&oacute;n de sus reservas y los activos seguros.</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>Seg&uacute;n la opini&oacute;n de algunos expertos, el aumento de la <strong>inversi&oacute;n en metales preciosos</strong> es una forma de diversificar la estructura de las reservas ante una creciente incertidumbre del <strong>comercio mundial y los mercados financieros</strong>. Hay algunos que consideran este enfoque como anacr&oacute;nico. Sin embargo, es imposible no reconocer que en los &uacute;ltimos a&ntilde;os, los bancos centrales aumentaron considerablemente sus inversiones en oro. Aparte de la incertidumbre econ&oacute;mica y pol&iacute;tica, las <a href="https://mundo.sputniknews.com/economia/201808101081101987-nuevos-aranceles-de-eeuu-turquia/" target="_blank">sanciones de EEUU</a> contra pa&iacute;ses como Turqu&iacute;a, cuando <a href="https://mundo.sputniknews.com/oriente-medio/201808131081145986-que-pasa-con-moneda-turca-tras-aranceles-de-eeuu/" target="_blank">la lira turca cay&oacute;</a> en un 20%, o <a href="https://mundo.sputniknews.com/economia/201909011088553872-entran-en-vigor-nuevos-aranceles-de-trump-contra-china/" target="_blank">contra China</a>, que se enfrent&oacute; con las restricciones y aranceles sobre sus productos, hizo apostar no al d&oacute;lar sino a otros activos m&aacute;s estables. Los analistas dicen que el oro puede ser considerado como un verdadero &quot;activo antid&oacute;lar&quot;.</p>

<p>&nbsp;</p>

<p>&quot;El oro no cambia su naturaleza: puede estar en lingotes, monedas; no tiene nacionalidad, existe desde hace mucho tiempo, y est&aacute; aceptado por todo el mundo entero por su valor estable. Sin duda el valor de cualquier moneda se determina por conexiones directas o indirectas, reales o supuestas, con el oro&quot;, dijo De Gaulle. Y parece que ten&iacute;a raz&oacute;n.</p>

<p>&nbsp;</p>', 'oro;valor;refugio;EEUU', 'dolar-vs-oro', 'publicado', null, curtime(), curtime(), curtime());

INSERT INTO `articles` VALUES (NULL, 2, NULL, 2, 'Sánchez quiere enviar al Rey a la toma de posesión del peronista Fernández', 'Amnistía Internacional pide a Don Felipe que aproveche sus reuniones con las autoridades en Cuba para interesarse por la disidencia', 'internacional.jpg', '<p>Tres semanas despu&eacute;s de regresar de Cuba, el Rey podr&iacute;a tener que volver a cruzar el Atl&aacute;ntico para representar a Espa&ntilde;a en la toma de posesi&oacute;n del nuevo presidente de Argentina,&nbsp;<a href=\"https://www.abc.es/internacional/abci-alberto-fernandez-gana-elecciones-argentina-pero-gobierno-pide-esperar-escrutinio-para-confirmar-si-balotaje-201910280019_noticia.html\">el peronista Alberto Fern&aacute;ndez</a>, que se celebrar&aacute; el<strong>&nbsp;10 de diciembre</strong>. Al menos, eso es lo que pretende el Gobierno en funciones de Pedro S&aacute;nchez, seg&uacute;n informa Europa Press, citando a fuentes conocedoras de estos planes.</p>\r\n\r\n<p>No obstante, la pretensi&oacute;n del Gobierno socialista&nbsp;<strong>podr&iacute;a frustrarse si el Rey convoca esa semana una ronda</strong>&nbsp;de consultas para proponer un candidato a presidente del Ejecutivo tras las elecciones del 10 de noviembre. Algo muy probable, ya que Don Felipe suele convocar a los partidos pol&iacute;ticos a la semana siguiente de que se constituyan las C&aacute;maras -lo que se producir&aacute; el 3 de diciembre-, ya que urge dotar a Espa&ntilde;a de gobierno.</p>\r\n\r\n<p>Tras el relevo en la Corona, Don Juan Carlos asumi&oacute; la representaci&oacute;n de Espa&ntilde;a en las tomas de posesi&oacute;n de varios presidentes iberoamericanos, funci&oacute;n que ejerci&oacute; Don Felipe mientras fue Pr&iacute;ncipe de Asturias. Sin embargo, cuando Don Juan Carlos decidi&oacute; retirarse de la vida oficial,&nbsp;<strong>el Rey empez&oacute; a asistir a algunas tomas de posesi&oacute;n</strong>, a la espera de que la Princesa de Asturias alcance la edad suficiente para asumir esta responsabilidad.</p>', 'Sánchez-posesion-peronista-fernandez', 'Sanchez-posesion-posesión-peronista-Fernandez', 'publicado', null, curtime(), curtime(), curtime());

INSERT INTO `articles` VALUES (NULL, 2, NULL, 2, 'Borrell ocultó las órdenes sobre Cataluña que dio a las embajadas', 'Transparencia dictaminó que es una información relevante que debía facilitar', 'inter2.jpg', '<p>El Ministerio de Exteriores oculta un argumentario pol&iacute;tico que envi&oacute; a los embajadores espa&ntilde;oles con&nbsp;<a href=\"https://www.abc.es/espana/abci-proces-traves-seis-deformaciones-201911240304_noticia.html\">las directrices dise&ntilde;adas para ellos despu&eacute;s de las elecciones del 28 de abril</a>&nbsp;y en medio del juicio del &laquo;proc&eacute;s&raquo;. El Consejo de Transparencia, organismo encargado de velar por que los ciudadanos accedan a la informaci&oacute;n p&uacute;blica a la que tienen derecho por ley, dict&oacute; una resoluci&oacute;n, a la que ha tenido acceso ABC, que exige al gabinete dirigido por Josep Borrell que entregue ese dossier por motivos de inter&eacute;s general.</p>\r\n\r\n<p>El documento que esconde Asuntos Exteriores se llama&nbsp;<strong>&laquo;Democracia y modernidad. Coordinaci&oacute;n con Embajadas.</strong>&nbsp;Estrategia de comunicaci&oacute;n para causa especial ante el Supremo. Argumentario actualizado tras las elecciones generales 2019&raquo; y fue elaborado por el director general de la Oficina de la Espa&ntilde;a Global, Joaqu&iacute;n Mar&iacute;a de Ar&iacute;stegui Laborde, para generar una estrategia com&uacute;n de comunicaci&oacute;n entre todos los embajadores espa&ntilde;oles.</p>\r\n\r\n<p>Cuando el Ministerio recibi&oacute; una petici&oacute;n, a trav&eacute;s del Portal de Transparencia, para que facilitara esas instrucciones, se neg&oacute; a ello,&nbsp;<strong>alegando que se trataba de unas &oacute;rdenes internas&nbsp;</strong>que no tienen por qu&eacute; trascender. S&iacute; detall&oacute;, en cambio, el autor del documento -que fue el Ar&iacute;stegui- y que este alto cargo fue el encargado de realizar la distribuci&oacute;n del mismo de manera &laquo;restringida y nominativa&raquo;. Sin embargo, ante las reclamaciones del demandante de la informaci&oacute;n, que no vio respondidas todas sus cuestiones en la respuesta del Ministerio,&nbsp;<a href=\"https://www.abc.es/espana/abci-gobierno-ignora-42-por-ciento-fallos-contra-consejo-transparencia-201911020221_noticia.html\">el Consejo de Transparencia redact&oacute; una resoluci&oacute;n instando a Exteriores a acatar la entrega.</a></p>', 'Borrel;Cataluña;oculto;embajadas', 'Borrel-Cataluña-oculto', 'publicado', null, curtime(), curtime(), curtime());

INSERT INTO `articles` VALUES (NULL, 2, NULL, 2, 'Evo Morales durante la entrevista - Paul Andrew Evo Morales, a ABC: «La OEA fortaleció el golpe de Estado en Bolivia»', 'El expresidente boliviano hace «cómplice» a la Organización de los Estados Americanos de lo que califica de «golpe de Estado» contra su presidencia', 'inter3.jpg', '<p>Evo Morales renunci&oacute; a la presidencia de Bolivia a principios del mes de noviembre, y abandon&oacute; el pa&iacute;s para refugiarse en M&eacute;xico, donde el presidente L&oacute;pez Obrador le ofreci&oacute; asilo por razones humanitarias. Durante casi un mes, el expresidente no ha dejado de hacer declaraciones y ofrecer entrevistas polarizando a&uacute;n m&aacute;s la situaci&oacute;n. Mientras tanto en Bolivia se trabaja contra reloj para realizar unas nuevas elecciones, tras las fraudulentas denunciadas por la Organizaci&oacute;n de los Estados Americanos (OEA), que precipitaron la salida de Morales del poder.</p>\r\n\r\n<p>&iquest;Por qu&eacute; no dio inmediatamente respuesta al informe de la OEA que le acusaba del fraude?</p>\r\n\r\n<p>El acuerdo con la canciller&iacute;a de la OEA es que hab&iacute;a que entregar un informe el d&iacute;a 13 de noviembre. El d&iacute;a 10, en la madrugada, nos pasaron la informaci&oacute;n preliminar y vimos que hab&iacute;a decisiones pol&iacute;ticas y no t&eacute;cnicas. Entonces, ped&iacute; hablar con Luis Almagro, el secretario general. No pude hablar con &eacute;l. Y avis&eacute; que con ese informe iban a provocar muertos en Bolivia. Hasta la semana pasada no hay informe oficial de la OEA. Con ese informe, fortaleci&oacute; el golpe de Estado, que inici&oacute; el d&iacute;a despu&eacute;s de las elecciones. Un estudio de la Universidad de Michigan concluye que no ha habido fraude. Multitud de acad&eacute;micos internacionales no lo ven y creen que la OEA deber&iacute;a pedir disculpas.</p>', 'Evo;Morales;golpe;Estado;Bolivia', 'Evo-Morales-golpe-Estado-Bolivia', 'publicado', null, curtime(), curtime(), curtime());

INSERT INTO `articles` VALUES (NULL, 2, NULL, 4, 'Joaquín supera a Di Stéfano', 'El extremo bético, con 38 años y 140 días, mete tres goles al Athletic en veinte minutos y se convierte en el jugador más veterano de LaLiga en hacer un triplete', 'deportes1.jpg', '<p>&ldquo;Es el primer triplete que he hecho en mi carrera y creo que ser&aacute; el &uacute;ltimo. No soy de hacer muchos goles&rdquo;, afirmaba Joaqu&iacute;n con una enorme sonrisa dibujada en su rostro poco despu&eacute;s de escribir una de las p&aacute;ginas m&aacute;s bonitas de su larga y fecunda trayectoria. Tambi&eacute;n de todo el f&uacute;tbol espa&ntilde;ol. Fue en su partido de club 770 como profesional cuando Joaqu&iacute;n dio un nuevo empuj&oacute;n a su carrera.&nbsp;<a href=\"https://elpais.com/deportes/2019/12/08/actualidad/1575809054_045815.html\">En 20 minutos le hab&iacute;a hecho tres goles al Athleti</a>c, que llegaba a Heli&oacute;polis, la ciudad del sol, como el equipo menos goleado de&nbsp;<a href=\"https://elpais.com/tag/liga_espanola_de_futbol/a/\">LaLiga</a>&nbsp;con nueve dianas en contra. Un reto m&aacute;s superado por este futbolista singular, con alma de torero y gen&eacute;tica privilegiada, que se ha llevado por delante nada m&aacute;s y nada menos que a Alfredo Di St&eacute;fano. El b&eacute;tico ha desbancado al genial jugador del Madrid como el futbolista m&aacute;s veterano en hacer un triplete en LaLiga. La extraordinaria actuaci&oacute;n de Joaqu&iacute;n se produjo con 38 a&ntilde;os y 140 d&iacute;as, dejando atr&aacute;s al mito del Madrid, quien hizo tres goles en un partido con 37 a&ntilde;os y 255 d&iacute;as en 1964.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Una irrupci&oacute;n majestuosa, asentada en tres acciones de una enorme calidad, con las que Joaqu&iacute;n destap&oacute; su magn&iacute;fico tarro de las esencias. Quiz&aacute;s, porque &eacute;l mismo es pura esencia del Betis, derramada con una fuerza inusitada para barrer a un buen equipo como es el Athletic. Palabras mayores para un futbolista incansable en su temporada n&uacute;mero 20 como profesional, en las que ha anotado siempre en cada una de ellas de manera consecutiva. Su felicidad ante los micr&oacute;fonos que lo buscaban como a una estrella demuestra su perfecto ensamblaje con la &eacute;pica y el sentimiento.</p>\r\n\r\n<p>Joaqu&iacute;n ha trascendido la historia del Betis para ocupar un puesto de honor en la del f&uacute;tbol nacional. Su longevidad le ha convertido en el futbolista con m&aacute;s victorias de LaLiga (217) sin haber pertenecido a Madrid, Barcelona o Atl&eacute;tico. Con 103 goles, es el futbolista en activo con m&aacute;s partidos en LaLiga (533). Es el quinto de todos los tiempos por detr&aacute;s de Buyo (542), Eusebio Sacrist&aacute;n (543), Ra&uacute;l (550) y Zubizarreta (622). &ldquo;Alcanzar a Zubizarreta me parecen palabras mayores&rdquo;, afirm&oacute; el propio jugador. El podio s&iacute; est&aacute; muy asequible incluso en este curso.</p>', 'Juaquín; Di Stéfano;Stefano;extremo bético;betis', 'Juanquín-Di Stéfano-Stefano-extremo betico-betis', 'publicado', null, curtime(), curtime(), curtime());

INSERT INTO `articles` VALUES (NULL, 2, NULL, 4, 'El cañón de las Guerreras', 'Shandy Barbosa, decisiva contra Montenegro, es la máxima goleadora de España en el Mundial tras su ausencia en el Europeo de 2018 por embarazo', 'deportes2.jpg', '<p>Un beb&eacute; mulato de siete meses alegr&oacute; las primeras horas interminables en la concentraci&oacute;n de la selecci&oacute;n femenina de balonmano en un hotel a las afueras de Madrid, antiguo picadero de gente bien, junto al hip&oacute;dromo de La Zarzuela y el Centro Nacional de Inteligencia. Todos le hac&iacute;an fiestas. Su presencia ayud&oacute; a aliviar el golpe an&iacute;mico que acababa de recibir el grupo por la baja de Carmen Mart&iacute;n a solo cuatro d&iacute;as de volar al&nbsp;<a href=\"https://elpais.com/tag/mundial_balonmano_femenino/a\">Mundial de Jap&oacute;n</a>. Era el hijo de Shandy Barbosa, ausente en el pasado Europeo por el embarazo y que ha vuelto al equipo como un trueno. &ldquo;La maternidad me ha dado tranquilidad para jugar los momentos importantes. Antes igual pecaba de alguna precipitaci&oacute;n&rdquo;, confiesa la portuguesa nacionalizada en 2012. Su&nbsp;<a href=\"https://elpais.com/deportes/2019/12/06/actualidad/1575611897_098664.html\">latigazo en el &uacute;ltimo segundo para abatir a Montenegro</a>&nbsp;(26-27) en el &uacute;ltimo partido de la primera fase lo certifica.</p>', 'Guerreras;Shandy Barbosa;Montenegro;España;Mundial', 'Shandy-Barbosa-decisiva conra Montenegro-España-Mundial', 'publicado', null, curtime(), curtime(), curtime());


INSERT INTO `articles` VALUES(NULL, 1, NULL, 2, 'Josep Borrell: "Europa debe centrarse más en lo que ocurre en América Latina"', 'El máximo responsable de la política exterior de la UE afirma que “hay problemas de defensa y seguridad que los europeos deberían poder afrontar solos”', 'politica-internacional-01.jpg','<p><strong>Pregunta.</strong> ¿Cómo va a concretarse ese salto?</p>
<p><strong>Respuesta.</strong> Abordando asuntos que deben ser resueltos más allá de nuestras fronteras. Por ejemplo, el cambio climático. No solo se trata de lo que hacemos nosotros, sino también de lo que tratamos que hagan los otros. La migración es otro de los grandes retos geopolíticos que viene de fuera de nuestras fronteras.</p>
<p><strong>P.</strong> ¿Y cómo piensa abordarlo?</p><p><strong>R.</strong> La migración puede ser considerada como un problema interior, de control de fronteras e inmigrantes irregulares. Pero no vamos a tener éxito con una política basada en decir que aquellos que no tienen derecho a quedarse deben volver a casa de inmediato. Es más fácil decirlo que hacerlo, porque deben ser aceptados por sus países. Si no tenemos acuerdos con los países de origen y tránsito, no podremos devolverlos.</p>
<p><strong>P.</strong> La semana que viene habrá un encuentro entre Francia, Alemania y el Reino Unido con Turquía en los márgenes de la cumbre de la OTAN. ¿Quién hace la política exterior europea, el alto representante o las capitales?</p><p><strong>R.</strong> Se trata de hacer una política exterior común. Y común no significa única, sino que coexiste con las políticas nacionales. Puede ser el mínimo común denominador o algo mayor. Y la idea es tratar de que el término común abarque más y más aspectos de la política exterior. Y que un día sea tan ampliamente común que sea única, aunque eso aún está lejos.</p>','borrel;defensa','Europa-debe-centrarse-más-en-lo-que-ocurre-en-América-Latina', 'publicado', null, curtime(), curtime(), curtime());

INSERT INTO `articles` VALUES(NULL, 1, NULL, 2, 'México asume el liderazgo regional con el asilo a Evo Morales', 'El paso al frente del Gobierno de López Obrador llega poco antes de que asuma la presidencia temporal de la CELAC, lo que puede propiciar un choque con la OEA', 'politica-internacional-02.jpg','<p>El asilo político por razones humanitarias a Evo Morales ha colocado a México al frente de los Gobiernos progresistas de América Latina. Un liderazgo que el Ejecutivo de Andrés Manuel López Obrador se había rehusado a aceptar desde que asumió la presidencia hace un año. Las circunstancias, no obstante, han llevado a México a dar un paso hacia adelante, en consonancia también con la tradición de acogida que ha demostrado tanto con el exilio republicano español como con los refugiados centroamericanos.</p>
<p>La sorpresiva petición de auxilio de Evo Morales, a la que México ha respondido con un amplio despliegue de medios, ha colocado a empujones al país frente a un nuevo escenario en el que eleva la voz para denunciar un “golpe de Estado” frente al silencio mayoritario del resto de Latinoamérica.</p>
<p>Hasta ahora, fiel a su ideario político, López Obrador había cumplido su viejo eslogan que dice: “No se puede ser candil de la calle y oscuridad en casa”. En la crisis venezolana se mantuvo lo máximo que pudo al margen. México ha sido la única potencia latinoamericana que no ha reconocido a Juan Guaidó como presidente interino y, aunque no ha respaldado a Nicolás Maduro, siempre ha optado por la vía dialogada a la que recurre el mandatario venezolano. Todo ha cambiado con Evo Morales.</p>','evomorales;mexico;bolivia','México-asume-el-liderazgo-regional-con-el-asilo-a-Evo-Morales', 'publicado', null, curtime(), curtime(), curtime());

INSERT INTO `articles` VALUES(NULL, 1, NULL, 2, 'Exteriores acusa a Torra de crear una red de ‘embajadas’ para forzar “la separación de España”', 'El Gobierno argumenta que esas delegaciones ocasionan "perjuicios de imposible o difícil reparación"', 'politica-internacional-03.jpg','<p>El Ministerio de Exteriores y la Generalitat catalana intensifican el pulso que mantienen por la acción exterior del Govern. El Ejecutivo central presentó hace unos días un recurso para que se paralice la apertura de las nuevas delegaciones del Govern en México, Buenos Aires y Túnez. El documento pide a la justicia que paralice la orden de apertura por considerar que estas oficinas ocasionan “perjuicios de imposible o difícil reparación al interés general”. La Generalitat respondió este martes nombrando a los encargados de esas tres oficinas.</p>
<p>El documento judicial, al que ha tenido acceso EL PAÍS, ofrece una crítica evaluación de la labor desarrollada hasta ahora por otras oficinas exteriores catalanas —“son un instrumento necesario para llevar a cabo una política de la Generalitat cuyo fin es la separación de España”— y pide a la justicia que impida su apertura. La reacción del Govern de designar a los responsables de esas delegaciones aún por abrir intensifica el pulso con Exteriores en vísperas de que se conozca la sentencia del Tribunal Supremo sobre los líderes del secesionismo.</p>
<p>La Generalitat ya tiene 15 delegaciones en funcionamiento alrededor del mundo, que prestan servicio en un total de 39 países. Su labor en la difusión internacional del procés ha resultado muy controvertida. Algunas fueron cerradas durante el periodo de aplicación del artículo 155 en Cataluña. Después se reabrieron y el Govern empezó a diseñar una estrategia de expansión que contemplaba abrir otras.</p>','torra;catalunya;independencia','Exteriores-acusa-a-Torra-de-crear-una-red-de-embajadas-para-forzar-la-separación-de-España', 'publicado', null, curtime(), curtime(), curtime());

INSERT INTO `articles` VALUES(NULL, 1, NULL, 2, 'Política de asilo', 'La nueva Comisión Europea debe propiciar un acuerdo sobre refugiados', 'politica-internacional-04.jpg','<p>El campo de refugiados de Moria, situado en la isla griega de Lesbos, en el que malviven desde hace años más de 15.000 migrantes en condiciones inhumanas, se ha convertido en el símbolo de un fracaso ético y político que Europa no puede permitirse por más tiempo. Alumbrar tras años de parálisis una nueva política de asilo es uno de los retos que debe priorizar la nueva Comisión Europea de Ursula von der Leyen. Sus primeras manifestaciones indican que tiene la voluntad política de hacerlo y es de esperar que encuentre la receptividad y la colaboración que merece un asunto tan delicado como este.</p>
<p>Cuatro años después de la grave crisis de 2015 que llevó al cierre de fronteras en varios países de la Unión, la incapacidad para articular una política migratoria y de asilo común permite que miles de refugiados y migrantes se encuentren varados en los países de la frontera sur mientras los barcos de rescate siguen recogiendo náufragos que nadie quiere acoger. Solo en las islas griegas hay 39.000 personas atrapadas pendientes de destino. El vigente reglamento de Dublín obliga a que el país de llegada sea el que tramite la petición de asilo. En 2018, el 75% de las solicitudes se concentraron en solo cinco países. Como la mayoría de los solicitantes llegan por el Mediterráneo, son los países de la frontera sur los que sufren las consecuencias de esa falta de acuerdo.</p>
<p>No será fácil superar el enquistamiento y la parálisis después de haber fracasado los sucesivos intentos de mancomunar una respuesta conjunta al problema. Fracasó en 2015 la política de cuotas obligatorias impulsada por Alemania en la que se acordó repartir 160.000 refugiados entre los diferentes países, y ha fracasado también el reparto que voluntariamente asumieron ocho países en 2018 para acoger a los náufragos rescatados en el mar después de que Italia acordara el cierre de puertos. No es aceptable que la tramitación del asilo se demore durante meses, y hasta años, por trabas burocráticas fácilmente superables, como ocurre ahora.</p>','asilo;refugiados','Política-de-asilo', 'publicado', null, curtime(), curtime(), curtime());
--
-- insert into 'deleted_articles'
--

-- INSERT INTO `deleted_articles` VALUES(NULL, 1, 2, 1, 'Final de la copa del rey', 'sub título del artículo', 'copadelrey.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pretium sapien id sem scelerisque, in fermentum nibh tempor. In auctor ligula in nunc malesuada convallis. Nulla venenatis iaculis elit et venenatis. Nulla ac velit egestas, sagittis sem vestibulum, auctor justo. Suspendisse sit amet posuere felis. In tempus odio ut quam vehicula, non dictum sem hendrerit. Cras non vulputate magna, vitae facilisis nibh. Etiam aliquet, turpis at porta mattis, nisl leo pellentesque libero, nec convallis purus felis in eros. Maecenas vel nisi ipsum. Sed porttitor est sit amet placerat congue. ', 'kw1;kw2;kw3', 'final-de-la-copa-del-rey', 'publicado', curtime(), curtime());

--
-- insert into 'in_review_published'
--

-- INSERT INTO `in_review_published` VALUES(NULL, 1, 2, 4, 'Final de la copa del rey publicado y editado', 'sub título del artículo', 'copadelrey.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pretium sapien id sem scelerisque, in fermentum nibh tempor. In auctor ligula in nunc malesuada convallis. Nulla venenatis iaculis elit et venenatis. Nulla ac velit egestas, sagittis sem vestibulum, auctor justo. Suspendisse sit amet posuere felis. In tempus odio ut quam vehicula, non dictum sem hendrerit. Cras non vulputate magna, vitae facilisis nibh. Etiam aliquet, turpis at porta mattis, nisl leo pellentesque libero, nec convallis purus felis in eros. Maecenas vel nisi ipsum. Sed porttitor est sit amet placerat congue. ', 'kw1;kw2;kw3', 'final-de-la-copa-del-rey', 'publicado', curtime(), curtime());
