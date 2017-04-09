import {Component} from "@angular/core";

@Component({
  moduleId: module.id,
  selector: 'my-app',
  // template: `<h1>Hello {{name}} ! </h1><github></github>`,
  templateUrl: "app.component.html"
})
export class AppComponent {
  name = 'Angular';
}
