import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ServiceCardListComponent } from './service-card-list.component';
import { ServiceCardComponent } from './service-card/service-card.component';
import { CashCardComponent } from './cash-card/cash-card.component';
import { RequestServiceCardComponent } from './request-service-card/request-service-card.component';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import { ChartsModule } from 'ng2-charts';
import { FormsModule } from '@angular/forms';



@NgModule({
  declarations: [ServiceCardListComponent, ServiceCardComponent, CashCardComponent, RequestServiceCardComponent],
  imports: [
    CommonModule,
    FontAwesomeModule,
    ChartsModule,
    FormsModule,
  ],
  exports:[
    ServiceCardListComponent
  ]
})
export class ServiceCardListModule { }
