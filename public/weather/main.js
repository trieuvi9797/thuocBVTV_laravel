var nhapten = document.querySelector(".nhapten");

function LayThoiTiet(){
	fetch("https://api.openweathermap.org/data/2.5/weather?q=" + nhapten.value + "&units=metric&appid=1ca44cc2cc52893f4cd43074adf048aa")
	.then((response)=>{
		if(!response.ok){
			alert("Không tìm thấy địa điểm. Hãy nhập địa điểm khác!");
			throw new Error("Không tìm thấy địa điểm!");
		}
		return response.json();/*lời hứa*/
	})
	.then(data => {
		const {name} = data;
		const {main, icon, description} = data.weather[0];
		const {Clouds, temp, humidity} = data.main;
		const {speed} = data.wind;
		const {lon, lat} = data.coord;
		 
		var thoitiet = data.weather[0];

        if(thoitiet = "overcast clouds")
			thoitiet = "Trời nắng";
		else if (thoitiet = "light intensity shower rain")
			thoitiet = "Trời mưa";
		else if (thoitiet = "fog")
			thoitiet = "Nhiều sương";
		else if (thoitiet = "clean")
			thoitiet = "Trời trong, không mây"
		else if (thoitiet = "mist")
			thoitiet = "Có sương mù";

		/*Làm tròn nhiệt độ*/
		var nd = temp.toFixed();
		
		/*Trả về các thông tin thời tiết*/
		document.querySelector(".tenthanhpho").innerText = name;

		document.querySelector(".motathoitiet").innerText = "Thời tiết: "+ thoitiet; //Thay đổi văn bản với 
		
        document.querySelector(".nhietdo").innerText = "Nhiệt độ: "+ nd + "°C";
		document.querySelector(".doam").innerText = "Độ ẩm: "+ humidity +"%";
		document.querySelector(".tocdogio").innerText = "Tốc độ gió: "+ speed +"km/h";
		/*Phương thức querySelector() trả về phần tử đầu tiên là phần tử con của phần tử mà nó được gọi ra khớp với nhóm bộ chọn được chỉ định.*/
		document.querySelector(".icon").src = "https://openweathermap.org/img/wn/" + icon + ".png";
		
		/*document.querySelector(".kinhdo").value = lon;
		document.querySelector(".vido").value = lat;*/
		
		
	});
};
function DinhDangSau(){
	document.querySelector(".icon").style.visibility= "visible";
	document.querySelector(".thoitiet").style.position="relative";
	document.querySelector(".thoitiet").style.left="0";
	document.querySelector(".thoitiet").style.top="10%";
	document.querySelector(".thoitiet").style.width="50%";
	document.querySelector(".nhietdo").style.margin="5%";
	document.querySelector(".doam").style.margin="5%";
	document.querySelector(".tocdogio").style.margin="5%";
};
document.querySelector(".search button").addEventListener("click", function(){
	LayThoiTiet();
	DinhDangSau();
});
document.querySelector(".nhapten").addEventListener("keyup", function(event){
	if(event.key == "Enter"){
		LayThoiTiet();
		DinhDangSau();
	}
});


