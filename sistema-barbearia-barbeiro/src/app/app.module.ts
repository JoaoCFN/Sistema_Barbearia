import { MaterialModule } from './material/material.module';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';

import { HomeComponentComponent } from './home-component/home-component.component';
import { SidebarComponent } from './sidebar/sidebar.component';
import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';
import { AppTitleComponent } from './app-title/app-title.component';
import { CardComponent } from './card/card.component';
import { HomeGraphicsComponent } from './home-graphics/home-graphics.component';
import { ChartsModule } from 'ng2-charts';
import { MyBarbershopComponent } from './my-barbershop/my-barbershop.component';
import { GeneralBarberDataComponent } from './general-barber-data/general-barber-data.component';
import { OperationDataComponent } from './operation-data/operation-data.component';
import { IonicModule } from '@ionic/angular';
import { BarbershopProfileComponent } from './barbershop-profile/barbershop-profile.component';
import { ScheduleComponent } from './schedule/schedule.component';
import { DataTablesModule } from 'angular-datatables';
import { ServiceRegisterComponent } from './service-register/service-register.component';
import { NgxDatatableModule } from '@swimlane/ngx-datatable/lib/ngx-datatable.module';
import { HomeComponent } from './home/home.component';





@NgModule({
  declarations: [
    AppComponent,
    HomeComponentComponent,
    SidebarComponent,
    HeaderComponent,
    FooterComponent,
    AppTitleComponent,
    CardComponent,
    HomeGraphicsComponent,
    MyBarbershopComponent,
    GeneralBarberDataComponent,
    OperationDataComponent,
    BarbershopProfileComponent,
    ScheduleComponent,
    ServiceRegisterComponent,
    HomeComponent,
  ],
  imports: [
    ReactiveFormsModule,
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    FontAwesomeModule,
    ChartsModule,
    FormsModule,
    MaterialModule,
    IonicModule.forRoot(),
    BrowserModule,
    BrowserAnimationsModule,
    //DataTablesModule,
    //NgxDatatableModule


  ],
  providers: [

  ],
  bootstrap: [AppComponent],
  exports: [
  ]
})
export class AppModule { }
