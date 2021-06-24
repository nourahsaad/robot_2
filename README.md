
#محاكي التحكم بقاعدة عرض الروبوت

يأتي هذا المشروع ليحاكي نظام ادارة الحركة بوحدة التحكم بالروبوت حيث يوفر النظام خيارات الحركة بالاتجاهات الاربعة مع رز التوقف الكامل وجميعها مرتبطة بقاعدة البيانات مباشرة ويتم تحديثها بشكل تلقائي عند الاستخدام


### المميزات 

- تحكم كامل بتحريك  قاعدة الروبوت بشكل كامل 
- واجهة سهلة الاستخدام وقابلة للاستخدام على جميع الشاشات
- واجهة قابلة للتطوير وإضافة المزيد من خيارات التحكم 
- المحاكي مرتبط بقاعدة بيانات تحدث بشكل مباشر عند تحديث إعدادت اي محرك
- إمكانية مراقبة سجل الحركة وتاريخ و وقت اخر تحديث
- نظام امن بشكل كامل يستحدث أحدث أساليب إدارة قواعد البيانات



# هيكلية بناء قاعدة البيانات


تم استخدام الربط الامن بين النظام وقاعدة البيانات من خلال استخدام
>     Mysqli
>     MySql v8.0

####تصميم هيكلة النظام تضمن جودة المدخلات

	if (isset($_POST['stop'])) {
			print_r($_POST);
			$datatime = date('Y-m-d H:i:s');
			$sql = "UPDATE controller
			SET stop = $pr_stop, 
			updated_at = '$datatime'";

			if (mysqli_query($conn, $sql)) {
				echo "<br>";
				echo '<span style="color:#fff;text-align:center;"> 
				تم حفظ التعديلات بنجاح</span>';

		} else {

			echo '<span style="color:#fff;text-align:center;">
			"حدث خطأ عند محاولة تحديث البيانات: " . mysqli_error($conn) " </span>';
		}



####تصميم جدول التحكم الرئيسي

مرفق هيكلية جدول التحكم الرئيسي

    
	CREATE TABLE `controller` (
	  `stop` int(11) NOT NULL DEFAULT 0,
	  `forward` int(11) NOT NULL DEFAULT 0,
	  `backward` int(11) NOT NULL DEFAULT 0,
	  `right` int(11) NOT NULL DEFAULT 0,
	  `left` int(11) NOT NULL DEFAULT 0,
	  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

=
### تم تصميم والتنفيذ بواسطة نوره سعد
