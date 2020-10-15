<template>
    <div>
        <ul>
            <li v-for="item in items" v-bind:key="item.name">
                {{ item.name }}の個数:<input type="number" v-on:change="item.quantity = $event.target.value" v-bind:value="item.quantity" min="0">
            </li>
        </ul>
        <hr>
        <div v-bind:style="errorMessageStyle">
        <ul>
            <li v-for="item in items" v-bind:key="item.name">
                {{ item.name }}:{{ item.price }}×{{ item.quantity }} = {{ item.price * item.quantity  | numberWithDelimiter }}円
            </li>
        </ul>
            <p>{{ items[0].name }}:{{ items[0].price }}×{{ items[0].quantity }}</p>
            <p>小計:{{ totalPrice | numberWithDelimiter }}円</p>
            <p>合計（税込）:{{ totalPriceWithTax | numberWithDelimiter }}</p>
            <!--属性値に応じて表示を出し分ける-->
            <p v-show="!canBuy">
                {{ 1000 | numberWithDelimiter }}円以上からご購入いただけます
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                items: [
                    {
                        name: '鉛筆',
                        price: 300,
                        quantity: 0,
                    },
                    {
                        name: 'ノート',
                        price: 400,
                        quantity: 0,
                    },
                    {
                        name: '消しゴム',
                        price: 500,
                        quantity: 0,
                    },
                ]
            }
        },
        filters: {
            numberWithDelimiter: function(value) {
                if (!value) {
                    return '0'
                }
                return value.toString().replace(/(\d)(?=(\d{3})+$)/g, '$1,')
            }
        },
        computed: {
            totalPrice: function() {
                return this.items.reduce(function(sum, item){
                    return sum + (item.price * item.quantity)
                },0)
            },
            totalPriceWithTax: function() {
                return Math.floor(this.totalPrice * 1.08)
            },
            canBuy: function() {
                return this.totalPrice >= 1000  //1000円以上から購入可能にする
            },
            errorMessageStyle: function() {
                return {
                    border: this.canBuy ? '':'1px solid red',
                    color: this.canBuy ? '': 'red'
                }
            }

        }
    }
</script>

<style>
</style>		
