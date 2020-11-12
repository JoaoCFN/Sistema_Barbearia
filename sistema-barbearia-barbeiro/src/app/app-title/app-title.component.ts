import { faHome } from '@fortawesome/free-solid-svg-icons';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-app-title',
  templateUrl: './app-title.component.html',
  styleUrls: ['./app-title.component.css']
})
export class AppTitleComponent implements OnInit {
  faHome =faHome
  constructor() { }

  ngOnInit(): void {
  }

}
