
<div id="vueApp">
    <router-view :key="$route.fullPath"></router-view>
</div>



<template id="dashboardContent">
    <div class="wrap">
        <h2> Dashboard </h2>

    </div>
</template>



<template id="dashboardCampaign">
    <div class="wrap">
        <h2 class="mb-5">{{ $store.state.title}}  Campaign <button class="btn btn-primary float-right" v-on:click="createCampaignForm()"> Create Campaign </button></h2>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>
    </div>
</template>



<template id="CreateCampaign">
    <div class="wrap">
        <h2 class="mb-5">  <button class="btn btn-primary mr-5" v-on:click="backToCampaign()" > Back </button> Create Campaign  </h2>

        <form class="row" v-on:submit.prevent="getPhoneNumbers">

            <div class="form-group col-sm-4">
                <label >Select Country</label>
                <select class="form-control"  >
                    <option v-for="country in countries" :value="country.short_name">{{country.name}}</option>
                </select>
            </div>

            <div class="form-group col-sm-4">
                <label >Select Number Types</label>
                <select class="form-control"  >
                    <option v-for="type in numberTypes" :value="type.id">{{type.name}}</option>
                </select>
            </div>
            <div class="form-group mt-4">
                <button class="mt-2 btn btn-primary float-right"  > Get Phone Number </button>
            </div>
        </form>

        <form class="row" v-if="phoneNumbers.length" v-on:submit.prevent="createCampaign">

            <div class="form-group col-sm-4">
                <label > Campaign Title</label>
                <input type="text" class="form-control">
            </div>

            <div class="form-group col-12 mt-4">
                <button class="mt-2 btn btn-primary float-right"  > Submit </button>
            </div>
        </form>
    </div>
</template>


<template id="dashboardReport">
    <div class="wrap">
        <h2>{{ $store.state.title}} Report</h2>

    </div>
</template>