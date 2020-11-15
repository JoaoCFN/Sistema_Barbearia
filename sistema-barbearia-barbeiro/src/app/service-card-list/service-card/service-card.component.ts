import { Component, OnInit } from '@angular/core';
import { faEllipsisH,faClock } from '@fortawesome/free-solid-svg-icons';
import { ChartDataSets, ChartOptions } from 'chart.js';
import { Color, Label } from 'ng2-charts';


@Component({
  selector: 'app-service-card',
  templateUrl: './service-card.component.html',
  styleUrls: ['./service-card.component.css']
})
export class ServiceCardComponent implements OnInit {

  faEllipsisH = faEllipsisH
  faClock=faClock

  public lineChartData: ChartDataSets[] = [
    { data: [4200, 4354, 5422, 5648, 4546, 7285, 2233], label: 'Mês' },
  ];
  public lineChartLabels: Label[] = ['01','02','03','04','05','06','07'];

public lineChartOptions: ChartOptions = {
  legend: {
    display:false
  },
responsive:true,
tooltips:{
  callbacks:{
    label: tooltipItem => `${tooltipItem.yLabel}: ${tooltipItem.xLabel}`,
    title: () => null,
  }
}
}

  public lineChartColors: Color[] = [
    {
      borderColor: '#FFC107',
      backgroundColor: '#79bff2',
    },
  ];
  public lineChartLegend = true;
  public lineChartType = 'line';
  public lineChartPlugins = [];

  constructor() { }


  ngOnInit(): void {
  }

}
