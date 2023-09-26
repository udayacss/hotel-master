/* 
Formatting numbers to currency format
*/
export function formatDecimal(number) {
    return number.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
}
