<template>
  <div id="body">
      <div class="nav-bar">
            <button v-if="currentView === 'list'" class="toggle-btn" type="button" @click="handleSwitch()">Switch To Form</button>
            <button v-if="currentView === 'form'" class="toggle-btn" type="button" @click="handleSwitch()">Switch To List</button>
      </div>
      <div class="body-content">
        <div v-if="currentView === 'form'">
                <AddContent />
        </div>
        <div class="main-content-wrapper" v-if="currentView === 'list'">
            <div class="main-view">
                <div class="header-div">
                    <h1>Budgets And Banners Contents</h1>
                </div>
                <div>
                    <ul class="advert-list">
                        <li v-for="adv in advert" v-bind:key="adv.id" >
                                <div class="info">
                                    <table class="table-info">
                                        <tbody>
                                            <tr>
                                                <td colspan="2"><h2 class="adv-name">{{ adv.name}}</h2></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">                                                
                                                <span>From: {{adv.dateFrom}}</span>
                                                <span>To: {{adv.dateTo}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold-text">Budget is set to </td>
                                                <td>$ {{adv.totalBudget}}</td>
                                            </tr>
                                            <tr>
                                                <td class="bold-text">Daily budge </td>
                                                <td>$ {{adv.dailyBudget}}</td>
                                            </tr>
                                            <tr>
                                                <td class="bold-text">Description </td>
                                                <td>$ {{adv.description}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="banners">
                                        <span class="image-preview">
                                            <img class="image" style="width:100%" :src="adv.bannerImage" alt="">
                                        </span>
                                    </div>
                                    <button class="banner-btn-del" type="button" @click="handleDeleAdvert(adv.addId)">DELETE🗑</button>
                                </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
  </div>
</template>

<script>
import AddContent from "./AddContent.vue";
import ViewContents from "./ViewContents.vue";



export default {
    data(){
        return {
            currentView: "list",
            currentV: false,
            advert: [],
            banner: [],
            newAdvert: "",
            currrentTaskId: "",
            imageAsBase64: ""

        };
    },

    components: {
        AddContent,
        ViewContents,
    },

    
    /**Didmount */
    created(){
        this.fetchAdvert();
    },

    methods: {
        handleSwitch(){
            if(this.currentView === "list"){
                this.currentView = "form"
                this.fetchAdvert();
            } else {
                this.fetchAdvert();
                this.currentView = "list"
            }
        }, 

/**IMage converter */
        imgUrl(link){
            
            return "";
        },
        /**Fetch Adverts */
        fetchAdvert(){
            fetch('/api/advert')
            .then((res) => res.json())
            .then(({data}) => {
                console.log(data)
                this.advert = data;
            })
            .catch(err => console.log(err))
        },
        /**Fetch Adverts */
        handleDeleAdvert(addId){
            if(confirm("are you sure?")){
                fetch(`/api/advert/del/${addId}`,  {
                    method: "DELETE",
                    body: "",
                }).then((res) => res.json())
                .then((data) => {
                    this.advert = this.advert.filter(({addId: id}) => id !== addId)
                });

            };
        },
        

        /**Show Banner */
        handleBanner(addId){
            fetch(`/api/banner/get/${addId}`)
            .then((res) => res.json())
            .then(({data}) => {
                console.log(data)
                this.currrentTaskId = addId;
                this.banner = data;
            })
            .catch(err => console.log(err))
        },
    }
}
</script>

<style>
.nav-bar {
    display: flex;
    justify-content: center;
    margin-top: 10px;
}
fieldset {
    border: 2px;
}

.nav-bar button {
    border-radius: 5px;
    border: none;
    letter-spacing: 3px;
    font-weight: bold;
    color: antiquewhite;
    background-color: cadetblue;
    transition: ease-in-out 1s;
}

.nav-bar button:hover {
    border-radius: 5px;
    border: none;
    letter-spacing: 4px;
    font-weight: bold;
    background-color: antiquewhite;
    color: cadetblue;
    transition: ease-in-out 1s;
}
.toggle-btn {
    width: 75%;
    height: 70px;
    font-weight: 400;
}

.body-content {

}

.main-content-wrapper {
    display: flow-root list-item;
    text-align: center;
    padding-top: 50px;
}

.banner-btn-del {
    color: red;
    margin: 5px;
    border-radius: 5px;
}

.image-preview {    
    width: 400px;
    max-height: 400px;
    border-radius: 10px;
    display: inline-block;
}
.image {
    width: 200px;
    max-height: 200px;
    width: inherit;
    border-radius: inherit;
}

.banner-btn-del {
    padding: 10px 20px;
    font-weight: bold;
    letter-spacing: 2px;
    color: brown;
    background-color: #ffff;
    border: .5px solid brown;
    transition: ease-in-out .5s;
}
.banner-btn-del:hover {
    padding: 10px 20px;
    letter-spacing: 3px;
    background-color: brown;
    color: #ffff;
    transition: ease-in-out .5s;
}

.info {
    display: inline-block;
    width: 500px;
}
.table-info {
    text-align: left;
    width: 100%;
    border-radius: 5px;
    background-color: bisque;
    min-height: 100px;

}

.adv-name {
    text-transform: uppercase;
    text-align: center;
}

.bold-text {
    font-weight: bold;
}
.brace-line {
    border: red;
}
</style>