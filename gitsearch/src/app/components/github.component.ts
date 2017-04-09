/**
 * Created by seyfer on 4/9/17.
 */
import {Component} from "@angular/core";
import {GitHubService} from "../services/github.service";

@Component({
  moduleId: module.id,
  selector: 'github',
  // template: `<h1>Hello github !</h1>`,
  templateUrl: 'github.component.html',
  providers: [GitHubService]
})

export class GithubComponent {
  user: any;
  repos: any;
  username: string;
  error: any;

  constructor(private _githubService: GitHubService) {
    console.log("GithubComponent");
  }

  search() {
    console.log('search ' + this.username);

    this.error = null;

    this._githubService.updateUsername(this.username);

    this._githubService.getUser().subscribe(user => {
        this.user = user;
      }, (err) => {
        this.error = err;
      },
      () => console.log("finish"));

    if (this.error != null) {
      this._githubService.getRepos().subscribe(repos => {
        this.repos = repos;
      });
    }
  }
}
