/**
 * Created by seyfer on 4/9/17.
 */
import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import "rxjs/add/operator/map";

@Injectable()
export class GitHubService {
  private username = 'seyfer';
  private client_id = '48823a05a51f35720c9c';
  private client_secret = 'c5d0470ea1306cd1488e7c1ae233beccb1735514';

  constructor(private _http: Http) {
    console.log('GitHubService');
  }

  getUser() {
    return this._http.get("https://api.github.com/users/" + this.username +
      "?client_id=" + this.client_id + "&client_secret=" + this.client_secret)
      .map(res => res.json());
  }

  getRepos() {
    return this._http.get("https://api.github.com/users/" + this.username + "/repos" +
      "?client_id=" + this.client_id + "&client_secret=" + this.client_secret)
      .map(res => res.json());
  }

  updateUsername(username: string) {
    this.username = username;
  }
}
