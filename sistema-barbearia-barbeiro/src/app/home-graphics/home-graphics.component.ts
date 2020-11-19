import { BasicGraphics } from './../model/basic-graphics';
import { Component, OnInit, ViewChild, Input } from '@angular/core';
import { ChartDataSets, ChartOptions, ChartType } from 'chart.js';
import { BaseChartDirective, Color, Label } from 'ng2-charts';
import {
  faCut,
  faClock,
  faMoneyBillWave,
} from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-home-graphics',
  templateUrl: './home-graphics.component.html',
  styleUrls: ['./home-graphics.component.css'],
})
export class HomeGraphicsComponent implements OnInit {
  faCut = faCut;
  faClock = faClock;
  faMoneyBillWave = faMoneyBillWave;
  @Input() public basicGraphic: BasicGraphics

data: number[]


  public getData(){
this.data = this.basicGraphic.data
  }





  constructor() { }

  ngOnInit(): void {
   //var data = new BasicGraphics(this.basicGraphic.title,this.basicGraphic.data,this.basicGraphic.label,this.basicGraphic.graphType)
  this.getData()
  }

  public lineChartData: ChartDataSets[]
  public lineChartLabels: Label[] = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
  /*public lineChartOptions: (ChartOptions & { annotation: any }) = {
    responsive: true,
  };*/

  public lineChartOptions: ChartOptions & { annotation: any } = {
    responsive: true,
    layout: {
      padding: {
          left: 15,
          right: 15,
          top: 20,
          bottom: 10
      }
  },

    scales: {
      // We use this empty structure as a placeholder for dynamic theming.
      xAxes: [
        {

          ticks: {
            fontColor: 'white',
            fontStyle: 'normal',
          },
        },{
          display:false
        }
      ],
      yAxes: [
        {
          //display: false,
          id: 'y-axis-0',
          position: 'left',
          ticks: {
            fontColor: 'white',
          },
        },
        {
          display: false,
          id: 'y-axis-1',
          position: 'right',
          gridLines: {
            color: 'white',
          },
          ticks: {
            fontColor: 'red',
          },
        },
      ],
    },
    annotation: {
      annotations: [
        {
          type: 'line',
          mode: 'vertical',
          scaleID: 'x-axis-0',
          value: 'March',
          borderColor: 'orange',
          borderWidth: 2,
          label: {
            enabled: true,
            fontColor: 'orange',
            content: 'LineAnno',
          },
        },
      ],
    },
  };

  public lineChartColors: Color[] = [
    {
      //green
      //backgroundColor: '#43A047',
      borderColor: 'white',
      pointBackgroundColor: 'white',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgba(148,159,177,0.8)',
    },
  ];


  public lineChartLegend = false;
  public lineChartType = 'line';
  public lineChartPlugins = [];

  public chartHovered({
    event,
    active,
  }: {
    event: MouseEvent;
    active: {}[];
  }): void {
    console.log(event, active);
  }
  @ViewChild(BaseChartDirective, { static: true }) chart: BaseChartDirective;


}
