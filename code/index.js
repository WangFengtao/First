var arr=[
    [7,8],[2,9],[1,2],[3,6]
]
var fn = function(arr1,arr2){
    return arr1[1] - arr2[1]
}
console.log(arr.sort(fn))
