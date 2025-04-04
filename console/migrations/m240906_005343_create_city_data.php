<?php

use yii\db\Migration;

/**
 * Class m240906_005343_create_city_data
 */
class m240906_005343_create_city_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("INSERT INTO `city` (`id`, `name`,`pid`) VALUES 
(589,'本溪市',8),
(632,'朝阳市',8),
(573,'大连市',8),
(593,'丹东市',8),
(617,'阜新市',8),
(584,'抚顺市',8),
(604,'葫芦岛市',8),
(598,'锦州市',8),
(621,'辽阳市',8),
(613,'盘锦市',8),
(560,'沈阳市',8),
(6858,'铁岭市',8),
(609,'营口市',8),
(579,'鞍山市',8),
(1303,'福州市',16),
(1362,'龙岩市',16),
(1370,'宁德市',16),
(1352,'南平市',16),
(1329,'莆田市',16),
(1332,'泉州市',16),
(1315,'厦门市',16),
(1317,'三明市',16),
(1341,'漳州市',16),
(681,'白城市',9),
(664,'白山市',9),
(639,'长春市',9),
(644,'吉林市',9),
(2992,'辽源市',9),
(651,'四平市',9),
(674,'松原市',9),
(657,'通化市',9),
(687,'延边朝鲜族自治州',9),
(51051,'宝坻区',3),
(51050,'北辰区',3),
(51044,'滨海新区',3),
(51049,'大港区',3),
(51035,'东丽区',3),
(51040,'红桥区',3),
(51037,'河北区',3),
(51038,'河东区',3),
(51036,'和平区',3),
(51039,'河西区',3),
(51042,'静海区',3),
(51041,'蓟州区',3),
(51047,'津南区',3),
(51052,'宁河区',3),
(51043,'南开区',3),
(51046,'武清区',3),
(51045,'西青区',3),
(1090,'滨州市',13),
(1060,'德州市',13),
(1025,'东营市',13),
(1099,'菏泽市',13),
(2900,'济宁市',13),
(1000,'济南市',13),
(1081,'聊城市',13),
(1072,'临沂市',13),
(1007,'青岛市',13),
(1108,'日照市',13),
(1112,'泰安市',13),
(1032,'潍坊市',13),
(1053,'威海市',13),
(1042,'烟台市',13),
(1022,'枣庄市',13),
(1016,'淄博市',13),
(1530,'常德市',18),
(1482,'长沙市',18),
(1544,'郴州市',18),
(1574,'怀化市',18),
(1501,'衡阳市',18),
(1586,'娄底市',18),
(1511,'邵阳市',18),
(1495,'湘潭市',18),
(1592,'湘西州',18),
(1522,'岳阳市',18),
(1555,'益阳市',18),
(1560,'永州市',18),
(1540,'张家界市',18),
(1488,'株洲市',18),
(454,'鹤壁市',7),
(482,'许昌市',7),
(446,'焦作市',7),
(2780,'济源市',7),
(420,'开封市',7),
(489,'漯河市',7),
(427,'洛阳市',7),
(502,'南阳市',7),
(438,'平顶山市',7),
(475,'濮阳市',7),
(517,'商丘市',7),
(495,'三门峡市',7),
(549,'信阳市',7),
(458,'新乡市',7),
(412,'郑州市',7),
(538,'驻马店市',7),
(527,'周口市',7),
(468,'安阳市',7),
(978,'常州市',12),
(925,'淮安市',12),
(919,'连云港市',12),
(984,'无锡市',12),
(904,'南京市',12),
(965,'南通市',12),
(933,'宿迁市',12),
(988,'苏州市',12),
(959,'泰州市',12),
(911,'徐州市',12),
(939,'盐城市',12),
(951,'扬州市',12),
(972,'镇江市',12),
(1132,'蚌埠市',14),
(1174,'亳州市',14),
(1201,'池州市',14),
(1159,'滁州市',14),
(1167,'阜阳市',14),
(1116,'合肥市',14),
(1124,'淮北市',14),
(1121,'淮南市',14),
(1151,'黄山市',14),
(1206,'六安市',14),
(1137,'马鞍山市',14),
(1180,'宿州市',14),
(1114,'铜陵市',14),
(1127,'芜湖市',14),
(2971,'宣城市',14),
(1140,'安庆市',14),
(2180,'毕节市',24),
(2144,'贵阳市',24),
(2150,'六盘水市',24),
(2205,'黔东南州',24),
(2222,'黔南州',24),
(2196,'黔西南州',24),
(2169,'铜仁市',24),
(2155,'遵义市',24),
(2189,'安顺市',24),
(2298,'保山市',25),
(2336,'楚雄州',25),
(2347,'大理州',25),
(2360,'德宏州',25),
(4108,'迪庆州',25),
(2318,'红河州',25),
(2235,'昆明市',25),
(2304,'丽江市',25),
(2291,'临沧市',25),
(2366,'怒江州',25),
(2281,'普洱市',25),
(2247,'曲靖市',25),
(2309,'文山州',25),
(2332,'西双版纳州',25),
(2258,'玉溪市',25),
(2270,'昭通市',25),
(2390,'宝鸡市',27),
(2442,'汉中市',27),
(2468,'商洛市',27),
(2386,'铜川市',27),
(2416,'渭南市',27),
(2402,'咸阳市',27),
(2376,'西安市',27),
(2428,'延安市',27),
(2454,'榆林市',27),
(2476,'安康市',27),
(72,'朝阳区',1),
(2901,'昌平区',1),
(2806,'石景山区',1),
(2810,'大兴区',1),
(2802,'东城区',1),
(2808,'房山区',1),
(2805,'丰台区',1),
(2814,'怀柔区',1),
(2800,'海淀区',1),
(2807,'门头沟',1),
(2816,'密云区',1),
(2953,'平谷区',1),
(2812,'顺义区',1),
(2809,'通州区',1),
(2801,'西城区',1),
(3065,'延庆区',1),
(2824,'宝山区',2),
(2815,'长宁区',2),
(2919,'崇明区',2),
(2837,'奉贤区',2),
(78,'黄浦区',2),
(2822,'虹口区',2),
(2826,'嘉定区',2),
(2817,'静安区',2),
(2835,'金山区',2),
(2825,'闵行区',2),
(2830,'浦东新区',2),
(2841,'普陀区',2),
(2833,'青浦区',2),
(2834,'松江区',2),
(2813,'徐汇区',2),
(2823,'杨浦区',2),
(1705,'潮州市',19),
(1655,'东莞市',19),
(1666,'佛山市',19),
(1601,'广州市',19),
(1643,'惠州市',19),
(1627,'河源市',19),
(1659,'江门市',19),
(1709,'揭阳市',19),
(1684,'茂名市',19),
(1634,'梅州市',19),
(1704,'清远市',19),
(1611,'汕头市',19),
(1650,'汕尾市',19),
(1617,'韶关市',19),
(1607,'深圳市',19),
(1672,'阳江市',19),
(1698,'云浮市',19),
(1677,'湛江市',19),
(1690,'肇庆市',19),
(1657,'中山市',19),
(1609,'珠海市',19),
(199,'保定市',5),
(239,'承德市',5),
(264,'沧州市',5),
(142,'石家庄市',5),
(164,'邢台市',5),
(148,'邯郸市',5),
(275,'衡水市',5),
(274,'廊坊市',5),
(248,'秦皇岛市',5),
(258,'唐山市',5),
(224,'张家口市',5),
(3074,'长治市',6),
(309,'大同市',6),
(325,'晋城市',6),
(336,'晋中市',6),
(379,'临汾市',6),
(368,'吕梁市',6),
(330,'朔州市',6),
(303,'太原市',6),
(350,'忻州市',6),
(318,'阳泉市',6),
(398,'运城市',6),
(2042,'巴中市',22),
(1930,'成都市',22),
(2033,'达州市',22),
(1962,'德阳市',22),
(1977,'广元市',22),
(2016,'广安市',22),
(2084,'甘孜州',22),
(2103,'凉山州',22),
(1993,'乐山市',22),
(1954,'泸州市',22),
(1960,'绵阳市',22),
(2058,'眉山市',22),
(1988,'内江市',22),
(2022,'南充市',22),
(1950,'攀枝花市',22),
(1983,'遂宁市',22),
(2005,'宜宾市',22),
(2047,'雅安市',22),
(1946,'自贡市',22),
(2065,'资阳市',22),
(2070,'阿坝州',22),
(2605,'果洛州',29),
(2597,'黄南州',29),
(2592,'海北州',29),
(2585,'海东地区',29),
(2603,'海南州',29),
(2620,'海西州',29),
(2580,'西宁市',29),
(2612,'玉树州',29),
(2495,'白银市',28),
(3080,'定西市',28),
(2564,'甘南州',28),
(2509,'嘉峪关市',28),
(2556,'酒泉市',28),
(2492,'金昌市',28),
(2487,'兰州市',28),
(2573,'临夏州',28),
(2534,'陇南市',28),
(2518,'平凉市',28),
(2525,'庆阳市',28),
(2501,'天水市',28),
(2544,'武威市',28),
(2549,'张掖市',28),
(742,'大庆市',10),
(793,'大兴安岭地区',10),
(727,'鹤岗市',10),
(698,'哈尔滨市',10),
(776,'黑河市',10),
(765,'佳木斯市',10),
(712,'齐齐哈尔市',10),
(737,'鸡西市',10),
(757,'牡丹江市',10),
(773,'七台河市',10),
(731,'双鸭山市',10),
(782,'绥化市',10),
(753,'伊春市',10),
(1387,'黄石市',17),
(1441,'黄冈市',17),
(1477,'荆门市',17),
(1413,'荆州市',17),
(2922,'潜江市',17),
(3154,'神农架林区',17),
(1405,'十堰市',17),
(1479,'随州市',17),
(2980,'天门市',17),
(1381,'武汉市',17),
(1432,'孝感市',17),
(1458,'咸宁市',17),
(1396,'襄阳市',17),
(2983,'仙桃市',17),
(1421,'宜昌市',17),
(1475,'鄂州市',17),
(1466,'恩施州',17),
(1806,'百色市',20),
(1746,'北海市',20),
(3168,'崇左市',20),
(1749,'防城港市',20),
(1757,'贵港市',20),
(1726,'桂林市',20),
(1792,'贺州市',20),
(1818,'河池市',20),
(1720,'柳州市',20),
(3044,'来宾市',20),
(1715,'南宁市',20),
(1753,'钦州市',20),
(1740,'梧州市',20),
(1761,'玉林市',20),
(3706,'白沙县',23),
(3709,'保亭县',23),
(3702,'澄迈县',23),
(3705,'昌江县',23),
(3703,'定安县',23),
(3034,'儋州市',23),
(3173,'东方市',23),
(2121,'海口市',23),
(3710,'乐东县',23),
(3708,'陵水县',23),
(3701,'临高县',23),
(3137,'万宁市',23),
(3115,'琼海市',23),
(3707,'琼中县',23),
(3711,'三沙市',23),
(3690,'三亚市',23),
(3704,'屯昌县',23),
(3698,'文昌市',23),
(3699,'五指山市',23),
(2723,'博尔塔拉州',31),
(2704,'巴音郭楞州',31),
(129142,'北屯市',31),
(2714,'昌吉州',31),
(2736,'塔城地区',31),
(2656,'石河子市',31),
(2666,'和田地区',31),
(2662,'哈密地区',31),
(2654,'克拉玛依市',31),
(146206,'胡杨河市',31),
(2699,'克孜勒苏柯尔克孜自治州',31),
(2686,'喀什地区',31),
(145492,'可克达拉市',31),
(53668,'昆玉市',31),
(53090,'铁门关市',31),
(15946,'图木舒克市',31),
(2658,'吐鲁番地区',31),
(2652,'乌鲁木齐市',31),
(4110,'五家渠市',31),
(2727,'伊犁州',31),
(2675,'阿克苏地区',31),
(2744,'阿勒泰地区',31),
(15945,'阿拉尔市',31),
(2632,'石嘴山市',30),
(2644,'固原市',30),
(2637,'吴忠市',30),
(2628,'银川市',30),
(3071,'中卫市',30),
(1213,'杭州市',15),
(1250,'湖州市',15),
(1243,'嘉兴市',15),
(1262,'金华市',15),
(1280,'丽水市',15),
(1158,'宁波市',15),
(1273,'衢州市',15),
(1255,'绍兴市',15),
(1290,'台州市',15),
(1233,'温州市',15),
(1298,'舟山市',15),
(1885,'抚州市',21),
(1911,'赣州市',21),
(1845,'九江市',21),
(1898,'吉安市',21),
(1832,'景德镇市',21),
(1827,'南昌市',21),
(1836,'萍乡市',21),
(1861,'上饶市',21),
(1842,'新余市',21),
(1874,'宜春市',21),
(1857,'鹰潭市',21),
(52994,'中国香港',52993),
(52995,'中国澳门',52993),
(3138,'昌都地区',26),
(3971,'林芝市',26),
(2951,'拉萨市',26),
(3107,'那曲地区',26),
(3144,'日喀则地区',26),
(3129,'山南地区',26),
(3970,'阿里地区',26),
(2768,'中国台湾',32),
(805,'包头市',11),
(880,'巴彦淖尔市',11),
(812,'赤峰市',11),
(799,'呼和浩特市',11),
(848,'呼伦贝尔市',11),
(902,'通辽市',11),
(810,'乌海市',11),
(823,'乌兰察布市',11),
(835,'锡林郭勒盟',11),
(895,'兴安盟',11),
(870,'鄂尔多斯市',11),
(891,'阿拉善盟',11),
(48131,'璧山区',4),
(48202,'巴南区',4),
(48203,'北碚区',4),
(48206,'长寿区',4),
(4164,'城口县',4),
(139,'垫江县',4),
(50954,'大渡口区',4),
(137,'石柱县',4),
(126,'大足区',4),
(131,'奉节县',4),
(114,'涪陵区',4),
(130,'丰都县',4),
(48201,'合川区',4),
(50950,'江北区',4),
(48204,'江津区',4),
(50952,'九龙坡区',4),
(132,'开州区',4),
(115,'梁平区',4),
(113,'万州区',4),
(119,'南川区',4),
(50951,'南岸区',4),
(138,'彭水县',4),
(128,'黔江区',4),
(50995,'綦江区',4),
(48132,'荣昌区',4),
(50953,'沙坪坝区',4),
(48133,'铜梁区',4),
(123,'潼南区',4),
(136,'巫山县',4),
(135,'巫溪县',4),
(129,'武隆区',4),
(141,'秀山县',4),
(48205,'渝北区',4),
(133,'云阳县',4),
(51026,'渝中区',4),
(48207,'永川区',4),
(140,'酉阳县',4),
(134,'忠县',4);");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240906_005343_create_city_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240906_005343_create_city_data cannot be reverted.\n";

        return false;
    }
    */
}
