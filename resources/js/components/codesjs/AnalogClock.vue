<template>
    <div>
        <h1>Analog Clock</h1>
        <svg id="clock" viewBox="0 0 100 100" width="500" height="500">
                <!--
            <defs>   ドロップシャドウ用のフィルタ定義が上手く動作しないためコメントアウト
                <filter id="shadow" x="-50%" y="-50%" width="200%" height="200%">
                    <feGaussianBlur in="SourceAlpha" stdDeviation="1" result="blur" />
                    <feOffset in="blur" dx="1" dy="1" result="shadow" />
                    <feMerge>
                        <feMergeNode in="SourceGraphic" />
                        <feMergeNode in="shadow" />
                    </feMerge>
                </filter>
            </defs>
                -->
            <circle id="face" cx="50" cy="50" r="45" /> <!-- 時計 -->
            <g id="ticks">   <!-- 12時間分の目盛り -->
                <line x1='50' y1='5.00' x2='50.00' y2='10.00' />
                <line x1='72.50' y1='11.03' x2='70.00' y2='15.36' />
                <line x1='88.97' y1='27.50' x2='84.64' y2='30.00' />
                <line x1='95.00' y1='50.00' x2='90.00' y2='50.00' />
                <line x1='88.97' y1='72.50' x2='84.64' y2='70.00' />
                <line x1='72.50' y1='88.97' x2='70.00' y2='84.64' />
                <line x1='50.00' y1='95.00' x2='50.00' y2='90.00' />
                <line x1='27.50' y1='88.97' x2='30.00' y2='84.64' />
                <line x1='11.03' y1='72.50' x2='15.36' y2='70.00' />
                <line x1='5.000' y1='50.00' x2='10.00' y2='50.00' />
                <line x1='11.03' y1='27.50' x2='15.36' y2='30.00' />
                <line x1='27.50' y1='11.03' x2='30.00' y2='15.36' />
            </g>
            <g id="numbers">    <!-- 十字方向の数字 -->
                <text x=50 y=18>12</text>
                <text x=85 y=53>3</text>
                <text x=50 y=88>6</text>
                <text x=15 y=53>9</text>
            </g>
            <line id="hourhand" v-bind:transform="hourhand" x1="50" y1="50" x2="50" y2="26" />
            <line id="minhand" v-bind:transform="minhand" x1="50" y1="50" x2="50" y2="20" />
            <!-- 時針と分針に影をつける処理が上手く動作しないためコメントアウト 
            <g id="hands" filter="url(#shadow)"> 
                <line id="hourhand" v-bind:style="hourhand" x1="50" y1="50" x2="50" y2="24" />
                <line id="minhand" v-bind:style="minhand" x1="50" y1="50" x2="50" y2="20" />
            </g>
            -->
        </svg>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                count: 0,
                timerid: null,
                now: 0,
                min: 0,
                hour: 0,
                minangle: 0,
                hourangle: 0,
            }
        },
        methods: {
            updateTime : function() {
                this.now = new Date()
                this.min = this.now.getMinutes()
                this.hour = (this.now.getHours() % 12) + this.min/60
                this.minangle = this.min * 6
                this.hourangle = this.hour * 30
                this.count++
                console.log(this.count)
                //1分後に再更新
                this.timerid = setTimeout(this.updateTime, 60000);
            }
        },
        computed: {
            minhand: function() {
                //svg属性を設定して、時計の周りを回転させる
                return "rotate("+ this.minangle +",50,50)"
            },
            hourhand: function() {
                //svg属性を設定して、時計の周りを回転させる
                return "rotate("+ this.hourangle +",50,50)"
            },
        },
        //ライフサイクルフック インスタンス生成時
        created: function() {
            console.log('created')
            console.log(this.count)
            this.updateTime()
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
        stroke: black;
        stroke-linecap: round;
        fill: #eef;
    }
    #face { stroke-width: 3px;}
    #ticks { stroke-width: 2;}
    #hourhand {
        stroke-width: 5px;
    }
    #minhand {
        stroke-width: 3px;
    }
    #numbers {
        font-family: sans-serif; font-size: 7pt; font-weight: bold;
        text-anchor: middle; stroke: none; fill: black;
    }

</style>		
