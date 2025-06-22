<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a class="ac" href="javascript:void(0)"  
onclick="window.history.pushState('data', 'Title', '/');">
Main
</a>
<a class="ac" href="javascript:void(0)"  
onclick="window.history.pushState('data', 'Title', '/Contact');">
Contact
</a>
<a class="ac" href="javascript:void(0)"  
onclick="window.history.pushState('data', 'Title', '/About');">
About
</a>
    <!--<script src="https://unpkg.com/vue@next/dist/vue.global.prod.js"></script>-->
    <!--<script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
    
    <script src="https://unpkg.com/vue-router@4"></script>-->


   <!-- <div id="app5">
        <h1>{{ title }}</h1>

       
        <router-link to="/">Home</router-link>
        <router-link to="/about">About</router-link>
        <router-link to="/portfolio">Portfolio</router-link>
        <router-link to="/contact">Contact</router-link>
        <router-link to="/post/5">Post 5</router-link>
        <router-link to="/post/7">Post 7</router-link>

       
        <router-view></router-view>
    </div>
    
    <script>


        const app = Vue.createApp({
        data() {
            return {
                title: "Vue routing",
            }
        }
    });

    const Home = { template: `<h1> Home</h1>` };
    const About = { template: `<h1> About</h1>` };
    const Portfolio = { template: `<h1> Portfolio</h1>` };
    const Contact = { template: `<h1> Contact</h1>` };

    const routes = [
        { path: "/", component: Home },
        { path: "/about", component: About },
        { path: "/portfolio", component: Portfolio },
        { path: "/contact", component: Contact },
        { path: "/post/:id", component: Contact }
    ];

    const router = VueRouter.createRouter({
           history: VueRouter.createWebHashHistory(),
           routes
    })

    document.title = 'test';

    app.use(router)
    app.mount('#app5')
        
    </script>-->

    <script type="text/javascript">
        //window.history.pushState('page2', 'Title', '/contact');
    </script>

</body>
</html>