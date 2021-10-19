<template>
  <div class="form-style-5">
    <form action="" @submit="addAdvert" enctype="multipart/form-data">
        <fieldset>
            <legend> Budget Name</legend>
            <input type="text" name="name" placeholder="Budget Name *" v-model="name">
			<div class="flex-justify-center">
				<div>					
					<legend>Date From </legend>
					<input type="date" name="dateFrom" placeholder="Date From *" v-model="dateFrom">
				</div>
				<div>					
					<legend>Date To </legend>
					<input type="date" name="dateTo" placeholder="Date To *" v-model="dateTo">
				</div>
			</div>
			<legend>Total Budget (USD)</legend>
			<input type="text" name="totalBudget" placeholder="Total Budget To (USD)*" v-model="totalBudget">
			<legend>Daily Budget (USD)</legend>
			<!-- <input ref="input" v-model="value" v-currency> -->
			<input type="text" name="dailyBudget" placeholder="Total Budget To (USD)*" v-model="dailyBudget">
			<div class="image-block">
				<legend>Add Banner </legend>
				<input type="file"  accept="image/*" name="bannerImage" v-on:change="onChange">
			</div>
        </fieldset>
        <fieldset>
            <legend>Description</legend>
            <textarea name="descrption" placeholder="Description" v-model="description"></textarea>
        </fieldset>
            <input type="submit" value="Save" />
        </form>
    </div>
</template>

<script>

// import { setValue, getValue } from "vue-currency-input";

export default {
	data(){
        return {
            currentView: "list",
            advert: [],
            banner: [],
            newAdvert: "",
            currrentTaskId: "",
			name: "",
			dateFrom: "",
			dateTo: "",
			totalBudget: "",
			dailyBudget: "",
			description: "",
			bannerImage: "",


        };
    },

	methods: {
		onChange(e) {
			// this.bannerImage = e.target.files[0];
			// createBase64Image(e.target.files[0])
			const file = document.querySelector('input[type=file]').files[0]
			const reader = new FileReader()

			let rawImg;
			reader.onloadend = () => {
			rawImg = reader.result;
			console.log("ONE", rawImg);
			this.bannerImage = rawImg;
			}
			reader.readAsDataURL(file);
			console.log(file)


		},
		createBase64Image(file){
			const reader = new FileReader();
			reader.onload = (e) => {
				let result = e.target.result;
				this.bannerImage = result.toString;
				console.log(result)
			};
			reader.readAsBinaryString(file);
		}
		,
		
        addAdvert(e){
            e.preventDefault();
			const newAdvert = {
					addId: Math.random().toString(36).substring(10),
					name: this.name,
					dateFrom: this.dateFrom,
					dateTo: this.dateTo,
					totalBudget: this.totalBudget,
					dailyBudget: this.dailyBudget,
					description: this.description,
					bannerImage: this.bannerImage
                };
				
				if(confirm("Submit now?")){
					console.log(newAdvert)
					fetch("/api/advert",  {
							method: "POST",
							headers: { "Content-Type": "application/json" },
							body: JSON.stringify(newAdvert)
						}
					).then(response => alert("Saved!"))
					.then(data => (this.addId = data.id));

                this.newAdvert = "";
				}
            
        },
	}
}
</script>

<style>

.form-style-5{
	max-width: 500px;
	padding: 10px 20px;
	background: #f4f7f8;
	margin: 10px auto;
	padding: 20px;
	background: #f4f7f8;
	border-radius: 8px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-5 fieldset{
	border: none;
}
.form-style-5 legend {
	font-size: 1.4em;
	margin-bottom: 10px;
}
.form-style-5 label {
	display: block;
	margin-bottom: 8px;
}
.form-style-5 input[type="text"],
.form-style-5 input[type="date"],
.form-style-5 input[type="datetime"],
.form-style-5 input[type="email"],
.form-style-5 input[type="number"],
.form-style-5 input[type="search"],
.form-style-5 input[type="time"],
.form-style-5 input[type="url"],
.form-style-5 textarea,
.form-style-5 select {
	font-family: Georgia, "Times New Roman", Times, serif;
	background: rgba(255,255,255,.1);
	border: none;
	border-radius: 4px;
	font-size: 15px;
	margin: 0;
	outline: 0;
	padding: 10px;
	width: 100%;
	box-sizing: border-box; 
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box; 
	background-color: #e8eeef;
	color:#8a97a0;
	-webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	margin-bottom: 30px;
}
.form-style-5 input[type="text"]:focus,
.form-style-5 input[type="date"]:focus,
.form-style-5 input[type="datetime"]:focus,
.form-style-5 input[type="email"]:focus,
.form-style-5 input[type="number"]:focus,
.form-style-5 input[type="search"]:focus,
.form-style-5 input[type="time"]:focus,
.form-style-5 input[type="url"]:focus,
.form-style-5 textarea:focus,
.form-style-5 select:focus{
	background: #d2d9dd;
}
.form-style-5 select{
	-webkit-appearance: menulist-button;
	height:35px;
}
.form-style-5 .number {
	background: #1abc9c;
	color: #fff;
	height: 30px;
	width: 30px;
	display: inline-block;
	font-size: 0.8em;
	margin-right: 4px;
	line-height: 30px;
	text-align: center;
	text-shadow: 0 1px 0 rgba(255,255,255,0.2);
	border-radius: 15px 15px 15px 0px;
}

.form-style-5 input[type="submit"],
.form-style-5 input[type="button"]
{
	position: relative;
	display: block;
	padding: 19px 39px 18px 39px;
	color: #FFF;
	margin: 0 auto;
	background: #1abc9c;
	font-size: 18px;
	text-align: center;
	font-style: normal;
	width: 100%;
	border: 1px solid #16a085;
	border-width: 1px 1px 3px;
	margin-bottom: 10px;
	border-radius: 5px;
}
.form-style-5 input[type="submit"]:hover,
.form-style-5 input[type="button"]:hover
{
	background: #109177;
}

</style>