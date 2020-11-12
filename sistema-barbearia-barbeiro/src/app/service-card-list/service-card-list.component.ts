import { Component, OnInit } from '@angular/core';
import { faCalendarAlt } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-service-card-list',
  templateUrl: './service-card-list.component.html',
  styleUrls: ['./service-card-list.component.css']
})
export class ServiceCardListComponent implements OnInit {
  faCalendarAlt = faCalendarAlt
  constructor() { }

  ngOnInit(): void {
  }

}
