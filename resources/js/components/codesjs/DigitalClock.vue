<template>
    <div>
        <h1>Digital Clock</h1>
        <span id="clock">{{formatTime}}</span>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                count: 0,
                timerid: null,
                formatTime: 0,
            }
        },
        methods: {
            displayTime : function() {
                var now = new Date()
                this.formatTime = now.toLocaleTimeString()
                this.count++
                console.log(this.count)
                this.timerid = setTimeout(this.displayTime, 1000);
            }
        },
        //ライフサイクルフック インスタンス生成時
        created: function() {
            console.log('created')
            console.log(this.count)
            this.displayTime()

        },
        //ライフサイクルフック vueインスタンス破棄前
        beforeDestroy: function() {
            console.log('beforeDestroy')
            clearTimeout(this.timerid)
        },
    }
</script>

<style>
    #clock {
        font: bold 24pt sans;
        background: #ddf;
        padding: 10px;
        border: solid black 2px;
        border-radius: 10px;
    }
</style>		
