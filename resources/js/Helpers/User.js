import Token from './Token'
import AppStorage from './AppStorage'
class User {
    dateformat(date = '') {

        const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
      ];







        var dates = [];
        var today = '';
        if (date == '') {
            var todaydate = new Date();
        } else {
            var todaydate = new Date(date);
        }
        var dd = todaydate.getDate();
        var mm = todaydate.getMonth() + 1;
        var yyyy = todaydate.getFullYear();
        let hrs = todaydate.getHours()
        let mins = todaydate.getMinutes()
        let secs = todaydate.getSeconds()
        var ampm = hrs >= 12 ? 'pm' : 'am';
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        if (hrs <= 9) {
            hrs = '0' + hrs
        }
var hrs12 = '';
        if(hrs>12){
            hrs12 = hrs-12;
        }else{
            hrs12 = hrs
        }


        if (mins < 10) {
            mins = '0' + mins
        }
        if (secs < 10) {
            secs = '0' + secs
        }
        today = yyyy + '-' + mm + '-' + dd;
        dates.push(today)
        today = mm + '-' + dd + '-' + yyyy;
        dates.push(today)
        today = mm + '/' + dd + '/' + yyyy;
        dates.push(today)
        today = dd + '-' + mm + '-' + yyyy;
        dates.push(today)
        today = dd + '/' + mm + '/' + yyyy;
        dates.push(today)
        today = yyyy;
        dates.push(today)
        today = yyyy + '-' + mm + '-' + dd + ' ' + hrs + ':' + mins + ' ' + ampm;
        dates.push(today)
        today = yyyy + '-' + mm + '-' + dd + ' ' + hrs + ':' + mins + ':' + secs;
        dates.push(today)

        if (date == '') {
            var todaydate2 = new Date();
        } else {
            var todaydate2 = new Date(date);
        }


        today = dd+' '+ monthNames[todaydate2.getMonth()] +' '+ yyyy + ' ' + hrs12 + ':' + mins + ' ' + ampm;
        dates.push(today)

        return dates;
    }
    responseAfterLogin(res) {
        // console.log(res.data)
        const access_token = res.data.access_token
        const username = res.data.name
        const userid = res.data.user_id
        const role = res.data.role
        if (Token.isValid(access_token)) {
            AppStorage.store(access_token, username, userid, role)
        }
    }
    hasToken() {
        const storeToken = localStorage.getItem('token');
        if (storeToken) {
            return Token.isValid(storeToken) ? true : false
        }
        false
    }
    loggedIn() {
        return this.hasToken()
    }
    loggedOut() {
        return  AppStorage.clear();
    }
    name() {
        if (this.loggedIn()) {
            return localStorage.getItem('user');
        }
    }
    id() {
        if (this.loggedIn()) {
            const payload = Token.payload(localStorage.getItem('token'));
            return payload.sub
        }
        return false
    }
}
export default User = new User()
