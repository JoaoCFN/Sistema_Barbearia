import { ComponentFixture, TestBed } from '@angular/core/testing';

import { RequestServiceCardComponent } from './request-service-card.component';

describe('RequestServiceCardComponent', () => {
  let component: RequestServiceCardComponent;
  let fixture: ComponentFixture<RequestServiceCardComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ RequestServiceCardComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(RequestServiceCardComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
