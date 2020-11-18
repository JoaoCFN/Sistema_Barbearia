import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HomeGraphicsComponent } from './home-graphics.component';

describe('HomeGraphicsComponent', () => {
  let component: HomeGraphicsComponent;
  let fixture: ComponentFixture<HomeGraphicsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ HomeGraphicsComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(HomeGraphicsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
